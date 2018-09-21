package com.example.proj_splash;

import android.content.Context;
import android.support.test.InstrumentationRegistry;
import android.support.test.rule.ActivityTestRule;
import android.view.View;

import org.junit.After;
import org.junit.Before;
import org.junit.Rule;
import org.junit.Test;

import static android.support.test.espresso.Espresso.onView;
import static android.support.test.espresso.action.ViewActions.click;
import static android.support.test.espresso.action.ViewActions.closeSoftKeyboard;
import static android.support.test.espresso.action.ViewActions.typeText;
import static android.support.test.espresso.assertion.ViewAssertions.matches;
import static android.support.test.espresso.intent.Intents.intended;
import static android.support.test.espresso.intent.matcher.ComponentNameMatchers.hasShortClassName;
import static android.support.test.espresso.intent.matcher.IntentMatchers.hasComponent;
import static android.support.test.espresso.intent.matcher.IntentMatchers.hasExtra;
import static android.support.test.espresso.intent.matcher.IntentMatchers.toPackage;
import static android.support.test.espresso.matcher.ViewMatchers.isDisplayed;
import static android.support.test.espresso.matcher.ViewMatchers.isEnabled;
import static android.support.test.espresso.matcher.ViewMatchers.withId;
import static org.hamcrest.core.AllOf.allOf;
import static org.hamcrest.core.IsNot.not;
import static org.junit.Assert.*;

public class WelcomeActivityTest {
    @Rule
    public ActivityTestRule<WelcomeActivity> splashPageRule = new ActivityTestRule<WelcomeActivity>(WelcomeActivity.class);

    private WelcomeActivity wActivity = null;

    //Before executing the test case
    @Before
    public void setUp() throws Exception {
        //Get the context
        wActivity = splashPageRule.getActivity();
    }

    @Test
    public void testLaunch()
    {
        View view = wActivity.findViewById(R.id.btn_next);

        assertNotNull(view);
        //onView(withId(R.id.btn_next)).check(matches(isEnabled()));
    }

    @Test
    public void useAppContext() {
        // Context of the app under test.
        Context appContext = InstrumentationRegistry.getTargetContext();

        assertEquals("com.example.proj_splash", appContext.getPackageName());
    }

    @Test
    public void isOnScreen(){

        onView(withId(R.id.btn_next)).check(matches(isDisplayed()));
        onView(withId(R.id.splash_page_load)).check(matches(isDisplayed()));
        onView(withId(R.id.layoutDots)).check(matches(isDisplayed()));
        onView(withId(R.id.btn_skip)).check(matches(isDisplayed()));
    }

    @Test
    public void verifyMessageSentToMessageActivity(){

        onView(withId(R.id.btn_next)).check(matches(isEnabled()));
        onView(withId(R.id.btn_next)).perform(click());
        onView(withId(R.id.btn_skip)).check(matches(isEnabled()));
    }

    @Test
    public void verifySkipDisabled(){

        onView(withId(R.id.btn_next)).perform(click()).check(matches(isEnabled()));
        onView(withId(R.id.btn_next)).perform(click()).check(matches(isEnabled()));
        onView(withId(R.id.btn_skip)).check(matches(not(isEnabled())));
        //onView(withId(R.id.btn_skip)).check(matches(isDisplayed()));
    }

    //After executing the test case
    @After
    public void tearDown() throws Exception {
        wActivity = null;
    }
    /*private static final String MESSAGE = "This is a test";
    private static final String PACKAGE_NAME = "com.example.myfirstapp";*/

    /* Instantiate an IntentsTestRule object. */
   /* @Rule
    public ActivityTestRule<WelcomeActivity> mIntentsRule =
            new ActivityTestRule<>(WelcomeActivity.class);
    @Test
    public void verifyMessageSentToMessageActivity(){
        onView(withId(R.id.btn_next)).check(matches(isEnabled()));
        onView(withId(R.id.btn_next)).perform(click());
        onView(withId(R.id.btn_skip)).check(matches(not(isEnabled())));
    }*/

   /* @Test
    public void verifyMessageSentToMessageActivity() {

        // Types a message into a EditText element.
        onView(withId(R.id.splash_page_load))
                .perform(typeText(MESSAGE), closeSoftKeyboard());

        // Clicks a button to send the message to another
        // activity through an explicit intent.
        onView(withId(R.id.splash_page_load)).perform(click());

        /*intended(allOf(
                hasComponent(hasShortClassName(".DisplayMessageActivity")),
                toPackage(PACKAGE_NAME),
                hasExtra(MainActivity.EXTRA_MESSAGE, MESSAGE)));

    }*/

}