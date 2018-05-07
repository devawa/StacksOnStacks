package com.example.ntikomathaba.arivllogindemo;

import android.app.Activity;
import android.support.annotation.NonNull;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

public class LoginActivity extends AppCompatActivity implements LoginView{

    private EditText userNameView;
    private EditText passwordView;
    private LoginPresenter presenter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        userNameView = (EditText) findViewById(R.id.etUsername);
        passwordView = (EditText) findViewById(R.id.etPassword);
        presenter = new LoginPresenter(this, new LoginService());
    }

    @Override
    protected void onRestoreInstanceState(@NonNull Bundle savedInstanceState){
        super.onRestoreInstanceState(savedInstanceState);
    }

    @Override
    protected void onSaveInstanceState(Bundle outState) {
        super.onSaveInstanceState(outState);
    }

    public void onLoginClicked(View view){
        presenter.onLoginClicked();
    }


    @Override
    public String getUserName() {
        return userNameView.getText().toString();
    }

    @Override
    public void showUsernameError(int resourceId) {
        userNameView.setError(getString(resourceId));
    }

    @Override
    public String getPassword() {
        return passwordView.getText().toString();
    }

    @Override
    public void showPasswordError(int password_error) {
        passwordView.setError(getString(password_error));
    }

    @Override
    public void startMainActivity() {
        new ActivityUtil(this).startMainActivity();
    }

    @Override
    public void showLoginError(int resourceId) {
        Toast.makeText(this, getString(resourceId), Toast.LENGTH_SHORT).show();
    }
}
