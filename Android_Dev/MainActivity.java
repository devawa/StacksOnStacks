package com.example.tyler.myapplication;

import android.content.Intent;
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

//import static com.example.tyler.myapplication.Welcome_User.startScan;
//import static com.example.tyler.myapplication.Welcome_User.stopScan;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
       final EditText one = (EditText) findViewById(R.id.FirstNumEditText);
        final EditText three = (EditText) findViewById(R.id.Pwrd);
        Button LogIn = (Button) findViewById(R.id.Send);
        LogIn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
             /*   switch(view.getId()){
                    case R.id.button:
                        Utils.toast(getApplicationContext(),"Scan Button Pressed");
                        if(!Welcome_User.mBTLeScanner.isScanning()){
                            startScan();
                        }else{
                            stopScan();
                        }
                        break;
                    default:
                        break;
                }//btle*/


                final String number = one.getText().toString();
                final String password = three.getText().toString();
                final TextView t = (TextView) findViewById(R.id.Result);

                Response.Listener<String> responseListener = new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try{
                            t.setText("bye ");
                            JSONObject jsonResponse = new JSONObject(response);
                            //JSONArray jsonResponse = new JSONArray(response);
   //                         TextView t = (TextView) findViewById(R.id.Result);
                            t.setText("hie ");
                            boolean success = (boolean) jsonResponse.getBoolean("success");
                            if(success){
                                t.setText("");
                               String name =jsonResponse.getString("name");
                                String surname =jsonResponse.getString("surname");
                              /*  AlertDialog.Builder builder= new AlertDialog.Builder(MainActivity.this);
                                builder.setMessage(name + " "+ surname)
                                        .setNegativeButton("Retry",null)
                                        .create().show();*/
                                Intent intent = new Intent(MainActivity.this,Welcome_User.class);
                               intent.putExtra("name",name);
                               intent.putExtra("surname",surname);
                                startActivity(intent);
                            }else{

                                AlertDialog.Builder builder= new AlertDialog.Builder(MainActivity.this);
                                builder.setMessage("Log In Failed")
                                        .setNegativeButton("Retry",null)
                                        .create().show();
                            }
                        }
                        catch(JSONException e){
                            e.printStackTrace();
                            AlertDialog.Builder builder= new AlertDialog.Builder(MainActivity.this);
                            builder.setMessage("Session Failed ... ")
                                    .setNegativeButton("Okay",null)
                                    .create().show();
                        }
                    }
                };
                final String LoginURL = "http://192.168.43.27:8080/ArivlApp/login.php";
                Login logInRequest = new Login(number,password,responseListener);
                RequestQueue queue = Volley.newRequestQueue(MainActivity.this);
                queue.add(logInRequest);
              //  super(Request.Method.POST, LoginURL,logInRequest,null);
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
