<?php
namespace App\Models;
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserController extends Controller
{
    public function signin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
    
        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが間違っています。',
        ])->onlyInput('email');
    }

    public function showSigninForm()
{
    return view('signin'); // signin.blade.phpを表示
}

public function account_edit()
{
    if (!auth()->check()) {
        return redirect()->route('signin')->with('status', 'ログインが必要です。');
    }
    $user = Auth::user(); // 現在認証されているユーザーを取得
    return view('account_edit', compact('user')); // ユーザー情報をビューに渡す
    $user = Auth::user();

if (is_null($user)) {
    // ユーザーが取得できていない場合の処理
    abort(403, 'Unauthorized action.');
}
}

public function update(Request $request)
{
    $user = Auth::user(); // 現在認証されているユーザーを取得

    // バリデーションルールを適用
    $validatedData = $request->validate([
        'name' => 'required|max:50',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'sometimes|min:6',
    ]);

    // パスワードが入力されている場合のみ更新
    if ($request->filled('password')) {
        $validatedData['password'] = bcrypt($request->password);
    }

    // ユーザー情報を更新
    $user->update($validatedData);

    return redirect()->route('account_edit')->with('success', 'アカウント情報が更新されました。');


}

public function showResetPasswordForm()
{
    return view('password-reset'); 
}
public function passwordReset(Request $request)
{
    // フォームから送信されたデータを取得
    $name = $request->input('name');
    $email = $request->input('email');
    $newPassword = $request->input('new_password');

    // ユーザーを名前とメールアドレスで検索
    $user = User::where('name', $name)->where('email', $email)->first();

    if ($user) {
        // ユーザーが見つかった場合、パスワードを更新
        $user->password = Hash::make($newPassword);
        $user->save();

        // ユーザーをログイン状態にする
        Auth::login($user);

        // リダイレクトや成功メッセージなどの処理
        return redirect()->route('home')->with('success', 'パスワードが更新されました。');
    } else {
        // ユーザーが見つからない場合のエラー処理
        return back()->withErrors(['error' => '指定されたユーザーは存在しません。']);
    }
}

public function signOut()
{
    Auth::logout();

    return redirect('/'); // ホームページなどにリダイレクト
}

}
