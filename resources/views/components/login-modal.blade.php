<div id="loginModal" class="login-modal">
    <div class="login-modal-container">
        <button id="closeModal" class="login-modal-close">x</button>

        <h2 class="login-title">Login</h2>

        <form id="loginForm" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="login-username-container">
                <label class="login-label">Username</label>
                <input id="loginUsername" type="text" name="username" required class="login-input">
                <p id="loginUsernameError" class="input-error-message"></p>
            </div>

            <div class="login-password-container">
                <label class="login-label">Password</label>
                <input id="loginPassword" type="password" name="password" required class="login-input">
                <p id="loginPasswordError" class="input-error-message"></p>
            </div>

            <button id="loginSubmit" type="submit" class="login-button">
                Login
            </button>
        </form>
    </div>
</div>