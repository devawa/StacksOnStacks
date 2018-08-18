package com.example.ntikomathaba.finallogin;

import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;
import android.content.SharedPreferences;

import com.google.firebase.auth.FirebaseAuth;

public class LoginActivity extends AppCompatActivity implements LoginView{
    private EditText phoneNumberView;
    private EditText OTPView;
    private LoginPresenter presenter;

    private FirebaseAuth mAuth;
    SharedPreferences sharedPreferences;
    SharedPreferences.Editor editor;
    Boolean savedLogin;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        phoneNumberView = (EditText) findViewById(R.id.etPhonenumber);
        OTPView = (EditText) findViewById(R.id.etOTP);

        presenter = new LoginPresenter(this, new LoginService());


        sharedPreferences = getSharedPreferences("loginref", MODE_PRIVATE);
        editor = sharedPreferences.edit();


       /* mAuth = FirebaseAuth.getInstance();
        if (mAuth != null){
            if (!FirebaseAuth.getInstance().getCurrentUser().getPhoneNumber().isEmpty()){
                //startMainActivity(new Intent(this, MainActivity.class));
            }
        }*/
       savedLogin = sharedPreferences.getBoolean("savelogin",false);
       if(savedLogin){
           phoneNumberView.setText(sharedPreferences.getString("phoneNumber",null));
          OTPView.setText(sharedPreferences.getString("OTP",null));
           startMainActivity();
       }
    }

    @Override
    protected void onRestoreInstanceState(@NonNull Bundle savedInstance){
        super.onRestoreInstanceState(savedInstance);
    }

    @Override
    protected void onSaveInstanceState(Bundle outState){
        super.onSaveInstanceState(outState);
    }

    public void onLoginClicked(View view){
        editor.putBoolean("savelogin",true);
        editor.putString("phoneNumber",getPhonenumber());
        editor.putString("OTP",getOTP());
        editor.commit();
        presenter.onLoginClicked();
    }

    @Override
    public String getPhonenumber() {
        return phoneNumberView.getText().toString();
    }

    @Override
    public void showPhonenumberError(int resourceID) {
        phoneNumberView.setError(getString(resourceID));
    }

    @Override
    public String getOTP() {
        return OTPView.getText().toString();
    }

    @Override
    public void showOTPError(int otp_error) {
        phoneNumberView.setError(getString(otp_error));
    }

    @Override
    public void startMainActivity() {
        new ActivityUtil (this).startMainActivity();
    }

    @Override
    public void showLoginError(int resourceID) {
        Toast.makeText(this,getString(resourceID), Toast.LENGTH_SHORT).show();
    }
}
