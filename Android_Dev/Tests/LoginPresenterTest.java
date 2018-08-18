package com.example.ntikomathaba.finallogin;

import org.junit.Before;
import org.junit.Test;
import org.junit.runner.RunWith;
import org.mockito.Mock;
import org.mockito.runners.MockitoJUnitRunner;

import static org.junit.Assert.*;
import static org.mockito.Mockito.verify;
import static org.mockito.Mockito.when;

@RunWith(MockitoJUnitRunner.class)
public class LoginPresenterTest {
    @Mock
    private LoginView view;

    @Mock
    private LoginService service;

    private LoginPresenter presenter;

    @Before
    public void setUp(){
        presenter = new LoginPresenter(view,service);
    }

    @Test
    public void showErrorWhenPhonenumberIsEmpty()  {
        when(view.getPhonenumber()).thenReturn("");
        presenter.onLoginClicked();

        verify(view).showPhonenumberError(R.string.phoneNumber_error);
    }

    @Test
    public void showErrorWhenOTPIsEmpty()  {
        when(view.getPhonenumber()).thenReturn("0849012004");
        when(view.getOTP()).thenReturn("");
        presenter.onLoginClicked();

        verify(view).showOTPError(R.string.otp_error);
    }

    @Test
    public void startMainActrivityWhenPhonenumberAndOTPAreCorrect(){
        when(view.getPhonenumber()).thenReturn("0849012004");
        when(view.getOTP()).thenReturn("2580");
        when(service.login("0849012004","2580")).thenReturn(true);
        presenter.onLoginClicked();

        verify(view).startMainActivity();
    }

    @Test
    public void showErrorMessageWhenPhonenumberAndOTPAreIncorrect(){
        when(view.getPhonenumber()).thenReturn("0849012004");
        when(view.getOTP()).thenReturn("2580");
        when(service.login("0849012004","2580")).thenReturn(false);
        presenter.onLoginClicked();

        verify(view).showLoginError(R.string.login_failed);
    }


}
