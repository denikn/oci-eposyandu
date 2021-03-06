<?php
namespace App\Http\Controllers\v1\_Auth;
use Validator;
use App\Models\v1\_Config\cf_users;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;

class AuthController extends BaseController 
{
    /**
     * The request instance.
     *
     * @var \Illuminate\Http\Request
     */
    private $request;
    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Request $request) {
        $this->request = $request;
    }
    /**
     * Create a new token.
     * 
     * @param  \App\User   $user
     * @return string
     */
    protected function jwt(cf_users $user) {
        $payload = [
            'iss' => "eposyandu-jwt", // Issuer of the token
            'sub' => $user->id, // Subject of the token
            'iat' => time(), // Time when JWT was issued. 
            'exp' => time() + 60*60 // Expiration time
        ];
        
        // As you can see we are passing `JWT_SECRET` as the second parameter that will 
        // be used to decode the token in the future.
        return JWT::encode($payload, env('JWT_SECRET'));
    } 
    /**
     * Authenticate a user and return the token if the provided credentials are correct.
     * 
     * @param  \App\User   $user 
     * @return mixed
     */
    public function authenticate(cf_users $user) {
        $this->validate($this->request, [
            'username' => 'required',
            'password' => 'required'
        ]);
        // Find the user by username
        $user = cf_users::where('username', $this->request->input('username'))->first();
        if (!$user) {
            // You wil probably have some sort of helpers or whatever
            // to make sure that you have the same response format for
            // differents kind of responses. But let's return the 
            // below respose for now.
            return response()->json([
                'code' => 400,
                'status' => 'username or password is wrong.'
            ], 400);
        }
        // Verify the password and generate the token
        if (Hash::check($this->request->input('password'), $user->password)) {
            return response()->json([
                'code' => 200,
                'status' => 'Success.',
                'data' => [
                    'data' => $user,
                    'token_type' => 'Bearer',
                    'access_token' => $this->jwt($user)
                ],
            ], 200);
        }
        // Bad Request response
        return response()->json([
            'code' => 400,
            'status' => 'username or password is wrong.'
        ], 400);
    }
}