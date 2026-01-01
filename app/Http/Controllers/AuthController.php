<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Register new user
     */
    // public function register(Request $request)
    // {
    //     $data = $request->validate([
    //         'name'     => ['required', 'string', 'max:255'],
    //         'age'      => ['required', 'integer', 'min:10', 'max:80'],
    //         'email'    => ['required', 'email', 'max:255', 'unique:users,email'],
    //         'password' => ['required', 'string', 'min:6'],
    //     ]);

    //     $user = User::create([
    //         'name'     => $data['name'],
    //         'age'      => $data['age'],
    //         'email'    => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);

    //     // إنشاء token
    //     $token = $user->createToken('api_token')->plainTextToken;

    //     return response()->json([
    //         'message' => 'Registered successfully',
    //         'user'    => $user,
    //         'token'   => $token,
    //     ], 201);
    // }

    public function register(Request $request)
{
    $data = $request->validate([
        'name'     => ['required', 'string', 'max:255'],
        // 'age'      => ['required', 'integer', 'min:10', 'max:80'],
        'email'    => ['required', 'email', 'max:255', 'unique:users,email'],
        'password' => ['required', 'string', 'min:6', 'confirmed'],
    ]);

    $user = User::create([
        'name'     => $data['name'],
        // 'age'      => $data['age'],
        'email'    => $data['email'],
        'password' => Hash::make($data['password']),
    ]);

    // تسجيل دخول المستخدم مباشرة
    Auth::login($user);

    // تحويل للصفحة الرئيسية
    return redirect()->route('home');
}

    /**
     * Login user
     */
    // public function login(Request $request)
    // {
    //     $data = $request->validate([
    //         'email'    => ['required', 'email'],
    //         'password' => ['required', 'string'],
    //     ]);

    //     $user = User::where('email', $data['email'])->first();

    //     if (! $user || ! Hash::check($data['password'], $user->password)) {
    //         throw ValidationException::withMessages([
    //             'email' => ['بيانات الدخول غير صحيحة'],
    //         ]);
    //     }

    //     $token = $user->createToken('api_token')->plainTextToken;

    //     return response()->json([
    //         'message' => 'Login successful',
    //         'user'    => $user,
    //         'token'   => $token,
    //     ]);
    // }


    

public function login(Request $request)
{
    $credentials = $request->validate([
        'email'    => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (!Auth::attempt($credentials)) {
        return back()->withErrors([
            'email' => 'بيانات الدخول غير صحيحة',
        ]);
    }

    $request->session()->regenerate();

    // توجيه حسب الدور
    if (auth()->user()->role === 'admin') {
        // return redirect()->route('admin.events');
        return redirect()->route('admin.events.index');
    }

    return redirect()->route('home');
}

    /**
     * Logout user
      */
    // public function logout(Request $request)
    // {
    //     $request->user()->currentAccessToken()?->delete();

    //     return response()->json([
    //         'message' => 'Logged out successfully'
    //     ]);
    // }


     public function destroy(Request $request)
    {
        Auth::logout(); // تسجيل خروج المستخدم
        $request->session()->invalidate(); // إبطال الجلسة
        $request->session()->regenerateToken(); // تجديد التوكن
        return redirect('/'); // إعادة التوجيه للصفحة الرئيسية بعد الخروج
    }

    /**
     * Get authenticated user
     */
    public function me(Request $request)
    {
        return response()->json($request->user());
    }
    protected function authenticated($request, $user)
{
    if ($user->role === 'admin') {
        return redirect()->route('admin.events');
    }

    return redirect()->route('home');
}

}
