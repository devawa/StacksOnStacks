package com.example.ntikomathaba.finallogin;

public interface LoginView {

    String getPhonenumber();

    void showPhonenumberError(int resourceID);

    String getOTP();

    void showOTPError(int resourceID);

    void startMainActivity();

    void showLoginError(int resourceID);
}
