package com.example.tyler.myapplication;

import android.app.Activity;
import android.content.Context;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.LinearLayout;
import android.widget.TextView;

import java.util.ArrayList;

import static com.android.volley.VolleyLog.TAG;

/**
 * Created by Tyler on 2018-03-23.
 */

public class ListAdapter_BTLE_DEVICES extends ArrayAdapter<BTLE_Device> {
    Activity activity;
    int layoutResourceID;
    ArrayList<BTLE_Device> devices;
    public ListAdapter_BTLE_DEVICES(Activity activity,int resource, ArrayList<BTLE_Device> objects){
        super(activity.getApplicationContext(),resource,objects);
        this.activity=activity;
        layoutResourceID = resource;
        devices = objects;
       // ((TextView) activity.findViewById(R.id.tv_rssi)).setText("remove later... R.layout.welcome: "+ Integer.toString(resource));
    }
    @Override
    public View getView(int position, View convertView, ViewGroup parent){
        //log.d("getView","Entered");
        Log.d(TAG, "getView: entered");

        if(convertView==null){
            //new code

            LayoutInflater inflater =
                    (LayoutInflater) activity.getApplicationContext().getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            convertView = inflater.inflate(layoutResourceID,parent,false);
        }
        BTLE_Device device = devices.get(position);
        String Name = device.getName();
        String Address =device.getAddress();
        int Rssi = device.getRSSI();
        TextView tv_name = (TextView) convertView.findViewById(R.id.name);
        if(Name!=null&&Name.length()>0){
            tv_name.setText(device.getName());
        }
        else{
            tv_name.setText("No Name");
        }
        TextView tv_rssi = (TextView) convertView.findViewById(R.id.rssi);
        tv_rssi.setText("RSSI: " + Integer.toString(Rssi));
        TextView tv_macaddr = (TextView) convertView.findViewById(R.id.address);
        if(Address != null && Address.length()>0){
            tv_macaddr.setText(device.getAddress());
        }
        else{
            tv_macaddr.setText("No address");
        }
       // tv_name.setText("sbf");
        return convertView;
    }
}
