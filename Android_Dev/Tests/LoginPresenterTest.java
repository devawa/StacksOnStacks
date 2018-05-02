package com.example.ntikomathaba.arivllogindemo;

import org.junit.Before;
import org.junit.Test;
import org.junit.runner.RunWith;
import org.mockito.Mock;
import org.mockito.runners.MockitoJUnitRunner;

import static org.mockito.Mock.*;
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
    public void setUp() throws Exception{
        presenter = new LoginPresenter(view,service);
    }

    /**
     * This test shows an error message if the username is empty
     */
    @Test
    public void showErrorMessageIfUserNameIsEmpty() throws Exception {
        when(view.getUserName()).thenReturn("");
        presenter.onLoginClicked();

        verify(view).showUsernameError(R.string.username_error);
    }

    /**
     * This test shows an error message if the password field is empty
     * @throws Exception
     */
    @Test
    public void showErrorMessageIfPasswordIsEmpty() throws Exception {
        when(view.getUserName()).thenReturn("ntiko");
        when(view.getPassword()).thenReturn("");
        presenter.onLoginClicked();

        verify(view).showPasswordError(R.string.password_error);
    }

    /**
     * This test starts the main activity if the username and password are correct
     * @throws Exception
     */
    @Test
    public void startMainActivityWhenUsernameAndPasswordAreCorrect() throws Exception {
        when(view.getUserName()).thenReturn("ntiko");
        when(view.getPassword()).thenReturn("mathaba");
        when(service.login("ntiko","mathaba")).thenReturn(true);
        presenter.onLoginClicked();

        verify(view).startMainActivity();
    }

    /**
     * This test shows a login error message if the username and password are incorrect
     * @throws Exception
     */
    @Test
    public void showLoginErrorWhenUsernameAndPasswordAreInvalid() throws Exception {
        when(view.getUserName()).thenReturn("ntiko");
        when(view.getPassword()).thenReturn("mathaba");
        when(service.login("ntiko","mathaba")).thenReturn(false);
        presenter.onLoginClicked();

        verify(view).showLoginError(R.string.login_failed);

    }
}