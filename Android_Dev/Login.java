package com.example.tyler.myapplication;

/**
 * @brief logging into database for verifying the user
 * Created by Stacks on Stacks on 2018-03-22.
 * @author Stacks on Stacks
 * @version 1.0
 */

import com.android.volley.toolbox.StringRequest;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;
import java.util.HashMap;
import java.util.Map;

public class Login extends StringRequest {
     private static final String LoginURL  = "http://192.168.43.27:8080/ArivlApp/login.php";
     private Map<String, String> params;

    /**
     *
     * @param number for checking cellphone number against database
     * @param password for checking password aginst database for verification
     * @param listener callback interface for delivering parsed responses
     */
     public Login(String number,String password,Response.Listener<String> listener){
          super(Method.POST, LoginURL,listener,null);
          params = new HashMap<>();
          params.put("number", number);
          params.put("password", password);
     }

     @Override
     public Map<String, String> getParams() {
          return params;
     }
}
