<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->trustProxies(at: '*');
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (TokenMismatchException $e, Request $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Sesi kedaluwarsa. Silakan refresh halaman.',
                    'csrf_token' => csrf_token(),
                ], 419);
            }

            return redirect()->back()
                ->withInput()
                ->with('error', 'Sesi formulir sempat kedaluwarsa, namun seluruh data yang Anda input telah diamankan kembali ke formulir. Silakan klik tombol Simpan kembali.');
        });

        $exceptions->render(function (HttpException $e, Request $request) {
            if ($e->getStatusCode() === 419) {
                if ($request->expectsJson()) {
                    return response()->json([
                        'message' => 'Sesi kedaluwarsa. Silakan refresh halaman.',
                        'csrf_token' => csrf_token(),
                    ], 419);
                }

                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Sesi formulir sempat kedaluwarsa, namun seluruh data yang Anda input telah diamankan kembali ke formulir. Silakan klik tombol Simpan kembali.');
            }
        });

        // Handle 404 / ModelNotFound on invoices cleanly
        $exceptions->render(function (ModelNotFoundException $e, Request $request) {
            if ($request->is('invoices/*')) {
                return redirect()->route('invoices.create')
                    ->with('error', 'Invoice yang Anda cari tidak ditemukan di database server (atau server baru saja diperbarui). Halaman Buat Invoice telah dibuka. Jika Anda memiliki draf item yang tersimpan di browser, silakan klik tombol "Pulihkan Draf" di bawah.');
            }
        });

        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            if ($request->is('invoices/*')) {
                return redirect()->route('invoices.create')
                    ->with('error', 'Halaman invoice tersebut tidak ditemukan. Kami telah mengarahkan Anda ke formulir Invoice agar Anda dapat menyimpan atau memulihkan data item yang sudah diketik sebelumnya.');
            }
        });
    })->create();


