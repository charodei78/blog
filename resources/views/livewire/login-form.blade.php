<div id="login">
    <div class="lthead" align="center"><span class="tphead">Авторизация</span></div>
    @guest
        @if(session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a
                    class="nav-link {{ $state == 'login' ? 'active' : '' }}"
                    wire:click="change_state('login')" ;
                    href="#"
                >
                    Логин
                </a>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link {{ $state == 'register' ? 'active' : '' }}"
                    wire:click="change_state('register')" ;
                    href="#"
                >
                    Регистрация
                </a>
            </li>
        </ul>
        @if($state == 'login')
            <form wire:submit.prevent="login">
        @else
            <form wire:submit.prevent="register">
        @endif
            @csrf
            <table style="margin:auto;">
                @if($state == 'register')
                    <tr>
                        <td><label for="nameField">Имя</label></td>
                        <td><input id="nameField" wire:model.defer="name" required type="text"></td>
                    </tr>
                    @error('name')
                    <tr class="text-danger error">
                        <td>{{ $message }}</td>
                    </tr>
                    @enderror
                @endif
                <tr>
                    <td><label for="loginField">Почта</label></td>
                    <td><input id="loginField" wire:model.defer="email" required type="email"></td>
                </tr>
                @error('email')
                <tr class="text-danger error">
                    <td>{{ $message }}</td>
                </tr>
                @enderror
                <tr>
                    <td><label for="passwordField">Пароль</label></td>
                    <td><input id="passwordField" wire:model.defet="password" min="6" required type="password"></td>
                </tr>
                @error('password')
                <tr class="text-danger error">
                    <td>{{ $message }}</td>
                </tr>
                @enderror
            </table>
            <input type="submit" class="btn btn-success m-2" value="{{ $state == 'login' ? 'Войти' : 'Зарегистрироваться' }}">
        </form>
    @endguest
    @auth
        <div class="alert alert-primary">Аутентификация выполенна</div>
        <button wire:click="logout" class="btn btn-danger m-3">Выйти</button>
    @endauth
</div>
<div class="ltgap"></div>
