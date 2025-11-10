<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? config('app.name') }}</title>
        <style>
            :root {
                color-scheme: light dark;
            }

            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif;
                background: radial-gradient(circle at top, #f5f9ff, #edf1f7);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #0f172a;
            }

            .card {
                width: min(420px, 92vw);
                background: #ffffff;
                border-radius: 18px;
                padding: 32px;
                box-shadow:
                    0 20px 60px -30px rgba(15, 23, 42, 0.45),
                    0 2px 12px rgba(15, 23, 42, 0.12);
            }

            .card header {
                display: flex;
                flex-direction: column;
                gap: 4px;
                margin-bottom: 28px;
            }

            .card header h1 {
                font-size: clamp(1.5rem, 2vw + 1rem, 2rem);
                margin: 0;
            }

            .card header p {
                margin: 0;
                color: #475569;
            }

            .alert {
                border-radius: 12px;
                padding: 12px 14px;
                font-size: 0.95rem;
                margin-bottom: 20px;
            }

            .alert-error {
                background: rgba(248, 113, 113, 0.16);
                color: #b91c1c;
            }

            .alert-success {
                background: rgba(22, 163, 74, 0.16);
                color: #166534;
            }

            .form-field {
                display: flex;
                flex-direction: column;
                gap: 8px;
                margin-bottom: 20px;
            }

            .form-field label {
                font-weight: 600;
                color: #1f2937;
            }

            .form-field input[type="email"],
            .form-field input[type="password"] {
                border: 1px solid #cbd5f5;
                border-radius: 12px;
                padding: 12px 14px;
                font-size: 1rem;
                transition: border-color 0.2s ease, box-shadow 0.2s ease;
            }

            .form-field input:focus {
                border-color: #6366f1;
                outline: none;
                box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15);
            }

            .form-helper {
                font-size: 0.85rem;
                color: #ef4444;
            }

            .form-actions {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 12px;
                flex-wrap: wrap;
            }

            .form-actions label {
                display: flex;
                align-items: center;
                gap: 8px;
                font-size: 0.95rem;
                color: #334155;
                cursor: pointer;
            }

            .form-actions input[type="checkbox"] {
                width: 18px;
                height: 18px;
                accent-color: #6366f1;
            }

            button.primary {
                background: linear-gradient(135deg, #6366f1, #8b5cf6);
                color: #ffffff;
                border: none;
                border-radius: 12px;
                padding: 12px 22px;
                font-weight: 600;
                font-size: 1rem;
                cursor: pointer;
                transition: transform 0.15s ease, box-shadow 0.15s ease;
            }

            button.primary:hover {
                transform: translateY(-1px);
                box-shadow: 0 12px 30px -20px rgba(99, 102, 241, 1);
            }

            .muted {
                margin: 0;
                margin-top: 24px;
                font-size: 0.9rem;
                color: #64748b;
                text-align: center;
            }

            @media (prefers-color-scheme: dark) {
                body {
                    background: radial-gradient(circle at top, #111827, #020617);
                    color: #e2e8f0;
                }

                .card {
                    background: #111827;
                    box-shadow:
                        0 20px 50px -30px rgba(15, 23, 42, 0.85),
                        0 1px 10px rgba(15, 23, 42, 0.35);
                }

                .card header p {
                    color: #94a3b8;
                }

                .form-field label {
                    color: #e2e8f0;
                }

                .form-field input[type="email"],
                .form-field input[type="password"] {
                    background: #0f172a;
                    border-color: #1e293b;
                    color: inherit;
                }

                .form-actions label {
                    color: #cbd5f5;
                }

                .muted {
                    color: #94a3b8;
                }
            }
        </style>
    </head>
    <body>
        <main class="card">
            @yield('content')
        </main>
    </body>
</html>
