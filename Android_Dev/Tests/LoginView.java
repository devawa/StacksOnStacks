package com.example.ntikomathaba.arivllogindemo;

interface LoginView {
    String getUserName();
    void showUsernameError(int resourceId);

    String getPassword();
    void showPasswordError(int resourceId);

    void startMainActivity();

    void showLoginError(int resourceId);
}
