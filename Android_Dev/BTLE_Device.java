package com.example.tyler.myapplication;

import android.bluetooth.BluetoothDevice;

/**
 * Created by Tyler on 2018-03-23.
 */

public class BTLE_Device {
    protected BluetoothDevice bluetoothDevice;
    private int rssi;

    public BTLE_Device(BluetoothDevice bluetoothDevice){
         this.bluetoothDevice = bluetoothDevice;
    }
    public String getAddress(){
        return bluetoothDevice.getAddress();
    }
    public String getName(){
        return bluetoothDevice.getName();
    }
    public void setRSSI(int rssi){this.rssi=rssi;}
    public int getRSSI(){return rssi;}
}
