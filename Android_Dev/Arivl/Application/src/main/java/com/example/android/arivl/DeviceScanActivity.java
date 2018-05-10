/*
 * Copyright (C) 2013 The Android Open Source Project
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

package com.example.android.arivl;

import android.Manifest;
import android.annotation.TargetApi;
import android.app.Activity;
<<<<<<< HEAD
=======
import android.app.ListActivity;
>>>>>>> master
import android.bluetooth.BluetoothAdapter;
import android.bluetooth.BluetoothDevice;
import android.bluetooth.BluetoothManager;
import android.content.Context;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.os.Bundle;
import android.os.Handler;
<<<<<<< HEAD
import android.view.Menu;
import android.view.MenuItem;
import android.widget.ProgressBar;
import android.widget.RelativeLayout;
=======
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ListView;
>>>>>>> master
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;

/**
 * Activity for scanning and displaying available Bluetooth LE devices.
 */
<<<<<<< HEAD
public class DeviceScanActivity extends Activity {
//    private LeDeviceListAdapter mLeDeviceListAdapter;
    private BluetoothAdapter mBluetoothAdapter;
    private ArrayList<BluetoothDevice> mLeDevices;
    private ProgressBar pBar;
    private boolean found;
    private boolean mScanning;
    private Handler mHandler;
    RelativeLayout myLayout = null;
=======
public class DeviceScanActivity extends ListActivity {
    private LeDeviceListAdapter mLeDeviceListAdapter;
    private BluetoothAdapter mBluetoothAdapter;
    private boolean mScanning;
    private Handler mHandler;

>>>>>>> master
    private static final int REQUEST_ENABLE_BT = 1;
    // Stops scanning after 10 seconds.
    private static final long SCAN_PERIOD = 5000;
    private static final int PERMISSION_REQUEST_COARSE_LOCATION = 1;
<<<<<<< HEAD
    private static final String ARIVLBOX_ADDRESS="5C:F8:21:F9:7C:93";
    private Context context;
=======
>>>>>>> master

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
<<<<<<< HEAD
        getActionBar().setTitle(R.string.app_name);
        getActionBar().setLogo(R.mipmap.arivl_logo);
        setContentView(R.layout.scan_devices);
        mLeDevices = new ArrayList<BluetoothDevice>();
        mHandler = new Handler();
        context = getApplicationContext();
=======
        getActionBar().setTitle(R.string.title_devices);
        mHandler = new Handler();

>>>>>>> master
        // Use this check to determine whether BLE is supported on the device.  Then you can
        // selectively disable BLE-related features.
        if (!getPackageManager().hasSystemFeature(PackageManager.FEATURE_BLUETOOTH_LE)) {
            Toast.makeText(this, R.string.ble_not_supported, Toast.LENGTH_SHORT).show();
            finish();
        }
        //Android devices with version api 23 and above require Location services permissions
        grantLocationPermission();
<<<<<<< HEAD
        found = false;
=======

>>>>>>> master
        // Initializes a Bluetooth adapter.  For API level 18 and above, get a reference to
        // BluetoothAdapter through BluetoothManager.
        final BluetoothManager bluetoothManager =
                (BluetoothManager) getSystemService(Context.BLUETOOTH_SERVICE);
        mBluetoothAdapter = bluetoothManager.getAdapter();

        // Checks if Bluetooth is supported on the device.
        if (mBluetoothAdapter == null) {
            Toast.makeText(this, R.string.error_bluetooth_not_supported, Toast.LENGTH_SHORT).show();
            finish();
            return;
        }
<<<<<<< HEAD
//        pBar = new ProgressBar(DeviceScanActivity.this);
//        myLayout = (RelativeLayout) findViewById(R.id.myLayout);
//        pBar.setLayoutParams(new RelativeLayout.LayoutParams(
//                RelativeLayout.LayoutParams.MATCH_PARENT,
//                RelativeLayout.LayoutParams.MATCH_PARENT
//        ));
//        View view = getLayoutInflater().inflate(R.layout.scan_devices,null);
//        setContentView(view);
//        getLayoutInflater().createView().addView(R.layout.scan_devices);

=======
>>>>>>> master
    }

    @TargetApi(23)
    public void grantLocationPermission(){
        if (this.checkSelfPermission(Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
            requestPermissions(new String[]{Manifest.permission.ACCESS_COARSE_LOCATION}, PERMISSION_REQUEST_COARSE_LOCATION);
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.main, menu);
        if (!mScanning) {
            menu.findItem(R.id.menu_stop).setVisible(false);
            menu.findItem(R.id.menu_scan).setVisible(true);
            menu.findItem(R.id.menu_refresh).setActionView(null);
        } else {
            menu.findItem(R.id.menu_stop).setVisible(true);
            menu.findItem(R.id.menu_scan).setVisible(false);
            menu.findItem(R.id.menu_refresh).setActionView(
                    R.layout.actionbar_indeterminate_progress);
        }
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {
            case R.id.menu_scan:
<<<<<<< HEAD
                mLeDevices.clear();
                scanLeDevice(true);
=======
                mLeDeviceListAdapter.clear();
//                scanLeDevice(true);
                selectArivlBox();
>>>>>>> master
                break;
            case R.id.menu_stop:
                scanLeDevice(false);
                break;
        }
        return true;
    }

    @Override
    protected void onResume() {
        super.onResume();

        // Ensures Bluetooth is enabled on the device.  If Bluetooth is not currently enabled,
        // fire an intent to display a dialog asking the user to grant permission to enable it.
        if (!mBluetoothAdapter.isEnabled()) {
            if (!mBluetoothAdapter.isEnabled()) {
                Intent enableBtIntent = new Intent(BluetoothAdapter.ACTION_REQUEST_ENABLE);
                startActivityForResult(enableBtIntent, REQUEST_ENABLE_BT);
            }
        }

        //Go To device control activity

<<<<<<< HEAD
        // Initializes list view adapter.
//        mLeDeviceListAdapter = new LeDeviceListAdapter();
//        setListAdapter(mLeDeviceListAdapter);
=======

        // Initializes list view adapter.
        mLeDeviceListAdapter = new LeDeviceListAdapter();
        setListAdapter(mLeDeviceListAdapter);
>>>>>>> master
        scanLeDevice(true);
//        selectArivlBox();
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        // User chose not to enable Bluetooth.
        if (requestCode == REQUEST_ENABLE_BT && resultCode == Activity.RESULT_CANCELED) {
            finish();
            return;
        }
        super.onActivityResult(requestCode, resultCode, data);
    }

    @Override
    protected void onPause() {
        super.onPause();
        scanLeDevice(false);
<<<<<<< HEAD
//        mLeDeviceListAdapter.clear();
    }


//    @Override
//    protected void onListItemClick(ListView l, View v, int position, long id) {
//        final BluetoothDevice device = mLeDeviceListAdapter.getDevice(position);
//        if (device == null) return;
//        final Intent intent = new Intent(this, DeviceControlActivity.class);
//        intent.putExtra(DeviceControlActivity.EXTRAS_DEVICE_NAME, device.getName());
//        intent.putExtra(DeviceControlActivity.EXTRAS_DEVICE_ADDRESS, device.getAddress());
//        if (mScanning) {
//            mBluetoothAdapter.stopLeScan(mLeScanCallback);
//            mScanning = false;
//        }
//        startActivity(intent);
//    }
=======
        mLeDeviceListAdapter.clear();
    }

    //Temp Method to select device and send it to the device control activity
    protected void selectArivlBox(){
//        if (device == null) return;
        final Intent intent = new Intent(this, DeviceControlActivity.class);
        intent.putExtra(DeviceControlActivity.EXTRAS_DEVICE_NAME, "5CF82187C7");
        intent.putExtra(DeviceControlActivity.EXTRAS_DEVICE_ADDRESS, "5C:F8:21:87:C7:EF");
    }

    @Override
    protected void onListItemClick(ListView l, View v, int position, long id) {
        final BluetoothDevice device = mLeDeviceListAdapter.getDevice(position);
        if (device == null) return;
        final Intent intent = new Intent(this, DeviceControlActivity.class);
        intent.putExtra(DeviceControlActivity.EXTRAS_DEVICE_NAME, device.getName());
        intent.putExtra(DeviceControlActivity.EXTRAS_DEVICE_ADDRESS, device.getAddress());
        if (mScanning) {
            mBluetoothAdapter.stopLeScan(mLeScanCallback);
            mScanning = false;
        }
        startActivity(intent);
    }
>>>>>>> master

    private void scanLeDevice(final boolean enable) {
        if (enable) {
            // Stops scanning after a pre-defined scan period.
            mHandler.postDelayed(new Runnable() {
                @Override
                public void run() {
                    mScanning = false;
                    mBluetoothAdapter.stopLeScan(mLeScanCallback);
                    invalidateOptionsMenu();
                }
            }, SCAN_PERIOD);
<<<<<<< HEAD
=======

>>>>>>> master
            mScanning = true;
//            mBluetoothAdapter.startDiscovery();
            mBluetoothAdapter.startLeScan(mLeScanCallback);
        } else {
            mScanning = false;
            mBluetoothAdapter.stopLeScan(mLeScanCallback);
        }
        invalidateOptionsMenu();
    }

    // Adapter for holding devices found through scanning.
<<<<<<< HEAD
//    private class LeDeviceListAdapter extends BaseAdapter {
//        private ArrayList<BluetoothDevice> mLeDevices;
//        private LayoutInflater mInflator;
//
//        public LeDeviceListAdapter() {
//            super();
//            mLeDevices = new ArrayList<BluetoothDevice>();
//            mInflator = DeviceScanActivity.this.getLayoutInflater();
//        }
//
//        public void addDevice(BluetoothDevice device) {
//            if(!mLeDevices.contains(device)) {
//                if(device.getAddress().contentEquals(ARIVLBOX_ADDRESS)) {
////                    System.out.println("ARIVLBOX FOUND");
//                    mLeDevices.add(device);
//                    Toast toast = Toast.makeText(context, "ArivlBox was found!", Toast.LENGTH_SHORT);
//                    toast.show();
//                }
//            }
//        }
//
////        public int findDevice(String mac){
////            return 0;
////        }
//
//        public BluetoothDevice getDevice(int position) {
//            return mLeDevices.get(position);
//        }
//
//        public void clear() {
//            mLeDevices.clear();
//        }
//
//        @Override
//        public int getCount() {
//            return mLeDevices.size();
//        }
//
//        @Override
//        public Object getItem(int i) {
//            return mLeDevices.get(i);
//        }
//
//        @Override
//        public long getItemId(int i) {
//            return i;
//        }
//
//        @Override
//        public View getView(int position, View convertView, ViewGroup parent) {
//            return null;
//        }
////
////        @Override
////        public View getView(int i, View view, ViewGroup viewGroup) {
////            ViewHolder viewHolder;
////            // General ListView optimization code.
////            if (view == null) {
////                view = mInflator.inflate(R.layout.listitem_device, null);
////
////                viewHolder = new ViewHolder();
////                viewHolder.deviceAddress = (TextView) view.findViewById(R.id.device_address);
////                viewHolder.deviceName = (TextView) view.findViewById(R.id.device_name);
////                view.setTag(viewHolder);
////            } else {
////                viewHolder = (ViewHolder) view.getTag();
////            }
////
////            BluetoothDevice device = mLeDevices.get(i);
////            final String deviceName = device.getName();
////            if (deviceName != null && deviceName.length() > 0)
////                viewHolder.deviceName.setText("ArivlBox");
////            else
////                viewHolder.deviceName.setText(R.string.unknown_device);
////            viewHolder.deviceAddress.setText(device.getAddress());
////            return view;
////        }
//    }
=======
    private class LeDeviceListAdapter extends BaseAdapter {
        private ArrayList<BluetoothDevice> mLeDevices;
        private LayoutInflater mInflator;

        public LeDeviceListAdapter() {
            super();
            mLeDevices = new ArrayList<BluetoothDevice>();
            mInflator = DeviceScanActivity.this.getLayoutInflater();
        }

        public void addDevice(BluetoothDevice device) {
            if(!mLeDevices.contains(device)) {
                mLeDevices.add(device);
            }
        }

//        public int findDevice(String mac){
//            return 0;
//        }

        public BluetoothDevice getDevice(int position) {
            return mLeDevices.get(position);
        }

        public void clear() {
            mLeDevices.clear();
        }

        @Override
        public int getCount() {
            return mLeDevices.size();
        }

        @Override
        public Object getItem(int i) {
            return mLeDevices.get(i);
        }

        @Override
        public long getItemId(int i) {
            return i;
        }

        @Override
        public View getView(int i, View view, ViewGroup viewGroup) {
            ViewHolder viewHolder;
            // General ListView optimization code.
            if (view == null) {
                view = mInflator.inflate(R.layout.listitem_device, null);
                viewHolder = new ViewHolder();
                viewHolder.deviceAddress = (TextView) view.findViewById(R.id.device_address);
                viewHolder.deviceName = (TextView) view.findViewById(R.id.device_name);
                view.setTag(viewHolder);
            } else {
                viewHolder = (ViewHolder) view.getTag();
            }

            BluetoothDevice device = mLeDevices.get(i);
            final String deviceName = device.getName();
            if (deviceName != null && deviceName.length() > 0)
                viewHolder.deviceName.setText(deviceName);
            else
                viewHolder.deviceName.setText(R.string.unknown_device);
            viewHolder.deviceAddress.setText(device.getAddress());

            return view;
        }
    }
>>>>>>> master

    // Device scan callback.
    private BluetoothAdapter.LeScanCallback mLeScanCallback =
            new BluetoothAdapter.LeScanCallback() {

        @Override
        public void onLeScan(final BluetoothDevice device, int rssi, byte[] scanRecord) {
            runOnUiThread(new Runnable() {
                @Override
                public void run() {
<<<<<<< HEAD
                    addDevice(device);
=======
                    mLeDeviceListAdapter.addDevice(device);
                    mLeDeviceListAdapter.notifyDataSetChanged();
                    if (device.getAddress()=="5C:F8:21:87:C7:EF"){
                        System.out.println("Found ArivlBox");
                    }
>>>>>>> master
                }
            });
        }
    };

<<<<<<< HEAD
    public void controlDevice(BluetoothDevice device){
        if(found){
            System.out.println("Found ArivlBox!");
            final Intent intent = new Intent(DeviceScanActivity.this, DeviceControlActivity.class);
            intent.putExtra(DeviceControlActivity.EXTRAS_DEVICE_NAME, device.getName());
            intent.putExtra(DeviceControlActivity.EXTRAS_DEVICE_ADDRESS, device.getAddress());
            if (mScanning) {
                mBluetoothAdapter.stopLeScan(mLeScanCallback);
                mScanning = false;
            }
            startActivity(intent);
        }
    }
    public void addDevice(BluetoothDevice device){
        if(!mLeDevices.contains(device)) {
            if(device.getAddress().contentEquals(ARIVLBOX_ADDRESS)) {
//                    System.out.println("ARIVLBOX FOUND");
                mLeDevices.add(device);
                Toast toast = Toast.makeText(context, "ArivlBox was found!", Toast.LENGTH_SHORT);
                toast.show();
                System.out.println("Found ArivlBox!");
                final Intent intent = new Intent(DeviceScanActivity.this, DeviceControlActivity.class);
                intent.putExtra(DeviceControlActivity.EXTRAS_DEVICE_NAME, device.getName());
                intent.putExtra(DeviceControlActivity.EXTRAS_DEVICE_ADDRESS, device.getAddress());
                if (mScanning) {
                    mBluetoothAdapter.stopLeScan(mLeScanCallback);
                    mScanning = false;
                }
                startActivity(intent);
            }
        }else{
            System.out.println("Unable to find ArivlBox");
        }
    }

=======
>>>>>>> master
    static class ViewHolder {
        TextView deviceName;
        TextView deviceAddress;
    }
}