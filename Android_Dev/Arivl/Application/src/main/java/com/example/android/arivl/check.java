package com.example.android.arivl;
import android.content.Intent;
import android.content.SharedPreferences;
import android.net.Uri;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.SearchView;
import android.widget.TextView;
import android.view.View;
import android.app.Activity;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.android.volley.VolleyError;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;
import java.lang.String;
import java.lang.Object;

public class check extends Activity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_check);
        final SharedPreferences sharedPreferences;
        final SharedPreferences.Editor editor;
        Boolean savelogin;
        sharedPreferences = getSharedPreferences("loginref",MODE_PRIVATE);
        savelogin = sharedPreferences.getBoolean("savelogin",false);
        editor = sharedPreferences.edit();

        final EditText one = (EditText) findViewById(R.id.FirstNumEditText);
        final EditText three = (EditText) findViewById(R.id.Pwrd);
        Button LogIn = (Button) findViewById(R.id.Send);
        if(savelogin){
            final String number =sharedPreferences.getString("username",null);
            final String password = sharedPreferences.getString("password",null);
            Response.Listener<String> responseListener = new Response.Listener<String>() {
                @Override
                public void onResponse(String response) {
                    try{
                        JSONObject jsonResponse = new JSONObject(response);
                        //JSONArray jsonResponse = new JSONArray(response);
                        boolean success = (boolean) jsonResponse.getBoolean("success");
                        if(success){
                            String name =jsonResponse.getString("name");
                            String surname =jsonResponse.getString("surname");
                            Intent intent = new Intent(check.this,DeviceScanActivity.class);
                            intent.putExtra("name",name);
                            intent.putExtra("surname",surname);
                            startActivity(intent);
                        }else{

                            Toast.makeText(getApplicationContext(),"Log In Failed",Toast.LENGTH_SHORT).show();
                        }
                    }
                    catch(JSONException e){
                        e.printStackTrace();
                        Toast.makeText(getApplicationContext(),"Log In Failed",Toast.LENGTH_SHORT).show();
                    }
                }
            };
            final String LoginURL = "http://192.168.56.1:8080/ArivlApp/login.php";
            Login logInRequest = new Login(number,password,responseListener);
            RequestQueue queue = Volley.newRequestQueue(getApplicationContext());
            queue.add(logInRequest);
        }
        LogIn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                final String number = one.getText().toString();
                final String password = three.getText().toString();
                Response.Listener<String> responseListener = new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try{
                            JSONObject jsonResponse = new JSONObject(response);
                            //JSONArray jsonResponse = new JSONArray(response);
                            boolean success = (boolean) jsonResponse.getBoolean("success");
                            if(success){
                                String name =jsonResponse.getString("name");
                                String surname =jsonResponse.getString("surname");
                                editor.putBoolean("savelogin",true);
                                editor.putString("username",number);
                                editor.putString("password",password);
                                editor.commit();
                                Intent intent = new Intent(check.this,DeviceScanActivity.class);
                                intent.putExtra("name",name);
                                intent.putExtra("surname",surname);
                                startActivity(intent);
                            }else{

                                Toast.makeText(getApplicationContext(),"Log In Failed",Toast.LENGTH_SHORT).show();
                            }
                        }
                        catch(JSONException e){
                            e.printStackTrace();
                            Toast.makeText(getApplicationContext(),"Log In Failed",Toast.LENGTH_SHORT).show();
                        }
                    }
                };
                final String LoginURL = "http://192.168.43.234:8080/ArivlApp/login.php";
                Login logInRequest = new Login(number,password,responseListener);
                RequestQueue queue = Volley.newRequestQueue(getApplicationContext());
                queue.add(logInRequest);
            }
        });

        Button help = (Button) findViewById(R.id.help);
        help.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String arivl = "http://www.arivlapp.com";
                Uri web = Uri.parse(arivl);
                Intent search = new Intent(Intent.ACTION_VIEW, web);
                if(search.resolveActivity(getPackageManager())!= null){
                    startActivity(search);
                }
            }
        });
    }
}
