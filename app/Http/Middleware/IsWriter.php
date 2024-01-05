<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;


class IsWriter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $userLogin = Auth::user();
        $post = Post::findOrFail($request->id);

        if($post->author !== $userLogin->id){
            return response()->json(['message' => 'Anda tidak memiliki akses'], 403);
        }
        return $next($request);
    }
}
