<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'SYSBRO') · SYSBRO</title>

    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;500;600;700;800&display=swap">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

@php
    $navItems = [
        ['label' => 'Início', 'href' => '/', 'match' => '/'],
        ['label' => 'Cadastrar Venda', 'href' => '/orders/create', 'match' => 'orders/*'],
        ['label' => 'Relatórios', 'href' => '/report', 'match' => 'report*'],
        ['label' => 'Gerenciar', 'href' => '/management', 'match' => 'management*'],
    ];
@endphp

<body class="h-full min-h-full bg-slate-50 font-sans text-slate-800 antialiased">
    <div class="flex min-h-screen flex-col">
        {{-- Top App Bar --}}
        <header class="sticky top-0 z-40 border-b border-slate-200 bg-white/90 backdrop-blur"
            x-data="{ open: false }">
            <div class="mx-auto flex h-16 max-w-6xl items-center justify-between gap-4 px-4 sm:px-6">
                {{-- Brand --}}
                <a href="/" class="flex shrink-0 items-center gap-2.5">
                    <span class="grid h-9 w-9 place-items-center rounded-xl bg-brand-600 text-white shadow-sm">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M4 11h16l-1.5 8.5a2 2 0 0 1-2 1.5H7.5a2 2 0 0 1-2-1.5L4 11Z" />
                            <path d="M12 11V7a3 3 0 0 1 6 0" />
                            <path d="M4 11l2-4h12l2 4" />
                        </svg>
                    </span>
                    <span class="text-lg font-extrabold tracking-tight text-slate-900">SYSBRO</span>
                </a>

                {{-- Desktop nav --}}
                <nav class="hidden items-center gap-1 md:flex" aria-label="Principal">
                    @foreach ($navItems as $item)
                        @php $active = request()->is($item['match']); @endphp
                        <a href="{{ $item['href'] }}"
                            @class([
                                'rounded-lg px-3 py-2 text-sm font-semibold transition-colors',
                                'bg-brand-50 text-brand-700' => $active,
                                'text-slate-600 hover:bg-slate-100 hover:text-slate-900' => !$active,
                            ])
                            @if ($active) aria-current="page" @endif>
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </nav>

                <div class="flex items-center gap-2">
                    <a href="/user/profile"
                        class="hidden items-center gap-2 rounded-lg px-3 py-2 text-sm font-semibold text-slate-600 transition-colors hover:bg-slate-100 hover:text-slate-900 md:flex">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                        </svg>
                        Minha conta
                    </a>

                    {{-- Mobile toggle --}}
                    <button type="button" @click="open = !open"
                        class="grid h-11 w-11 place-items-center rounded-lg text-slate-600 hover:bg-slate-100 md:hidden"
                        :aria-expanded="open.toString()" aria-label="Abrir menu">
                        <svg x-show="!open" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <line x1="4" y1="6" x2="20" y2="6" />
                            <line x1="4" y1="12" x2="20" y2="12" />
                            <line x1="4" y1="18" x2="20" y2="18" />
                        </svg>
                        <svg x-show="open" x-cloak class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            aria-hidden="true">
                            <line x1="6" y1="6" x2="18" y2="18" />
                            <line x1="6" y1="18" x2="18" y2="6" />
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Mobile nav panel --}}
            <nav x-show="open" x-cloak x-transition class="border-t border-slate-200 bg-white md:hidden"
                aria-label="Principal (mobile)">
                <div class="space-y-1 px-4 py-3">
                    @foreach ($navItems as $item)
                        @php $active = request()->is($item['match']); @endphp
                        <a href="{{ $item['href'] }}"
                            @class([
                                'block rounded-lg px-3 py-3 text-base font-semibold transition-colors',
                                'bg-brand-50 text-brand-700' => $active,
                                'text-slate-700 hover:bg-slate-100' => !$active,
                            ])>
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                    <a href="/user/profile"
                        class="block rounded-lg px-3 py-3 text-base font-semibold text-slate-700 hover:bg-slate-100">
                        Minha conta
                    </a>
                </div>
            </nav>
        </header>

        {{-- Flash message --}}
        @if (session('msg'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                x-transition.opacity class="mx-auto mt-4 w-full max-w-6xl px-4 sm:px-6" role="status"
                aria-live="polite">
                <div class="flex items-center gap-3 rounded-xl border border-brand-200 bg-brand-50 px-4 py-3 text-sm font-semibold text-brand-800 shadow-sm">
                    <svg class="h-5 w-5 shrink-0 text-brand-600" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        aria-hidden="true">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                        <path d="m9 11 3 3L22 4" />
                    </svg>
                    <span>{{ session('msg') }}</span>
                    <button type="button" @click="show = false"
                        class="ml-auto rounded p-1 text-brand-700 hover:bg-brand-100" aria-label="Fechar aviso">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <line x1="6" y1="6" x2="18" y2="18" />
                            <line x1="6" y1="18" x2="18" y2="6" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        {{-- Main content --}}
        <main class="mx-auto w-full max-w-6xl flex-1 px-4 py-8 sm:px-6 sm:py-10">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="border-t border-slate-200 bg-white">
            <div class="mx-auto max-w-6xl px-4 py-6 text-center text-sm text-slate-500 sm:px-6">
                <script>document.write(new Date().getFullYear());</script> &copy; SYSBRO — Todos os direitos reservados
            </div>
        </footer>
    </div>
</body>

</html>
