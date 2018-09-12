package com.example.android.arivl;
import android.Manifest;
import android.annotation.TargetApi;
import android.app.Activity;
import android.app.ListActivity;
import android.app.Service;
import android.bluetooth.BluetoothAdapter;
import android.bluetooth.BluetoothDevice;
import android.bluetooth.BluetoothManager;
import android.content.Context;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.os.Build;
import android.os.Bundle;
import android.os.Handler;
import android.os.IBinder;
import android.support.annotation.Nullable;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.UUID;


public class DeviceScanService extends Service {

    @Nullable
    @Override
    public IBinder onBind(Intent intent) {
        return null;
    }

    @Override
    public int onStartCommand(Intent intent, int flags, int startId) {

         class DeviceScanActivity extends ListActivity {
            private LeDeviceListAdapter mLeDeviceListAdapter;
            private BluetoothAdapter mBluetoothAdapter;
            private boolean mScanning;
            private Handler mHandler;
            private LayoutInflater mInflator;
            private static final int REQUEST_ENABLE_BT = 1;
            // Stops scanning after 10 seconds.
            private static final long SCAN_PERIOD = 5000;
            private static final int PERMISSION_REQUEST_COARSE_LOCATION = 1;
            private Context context;

            @Override
            public void onCreate(Bundle savedInstanceState) {
                super.onCreate(savedInstanceState);
                getActionBar().setTitle(R.string.app_name);
                getActionBar().setLogo(R.mipmap.arivl_logo);
                mHandler = new Handler();
                context = getApplicationContext();
                // Use this check to determine whether BLE is supported on the device.  Then you can
                // selectively disable BLE-related features.
                if (!getPackageManager().hasSystemFeature(PackageManager.FEATURE_BLUETOOTH_LE)) {
                    Toast.makeText(this, R.string.ble_not_supported, Toast.LENGTH_SHORT).show();
                    finish();
                }
                //Android devices with version api 23 and above require Location services permissions

                if (Build.VERSION.SDK_INT >= 23) {
                    grantLocationPermission();
                }
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
            }

            @TargetApi(23)
            public void grantLocationPermission() {
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
                        mLeDeviceListAdapter.clear();
                        scanLeDevice(true);
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


                // Initializes list view adapter.
                mLeDeviceListAdapter = new LeDeviceListAdapter();

                setListAdapter(mLeDeviceListAdapter);
                scanLeDevice(true);
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

            private void scanLeDevice(final boolean enable) {

                if (enable) {
                    // Stops scanning after a pre-defined scan period.
                    Thread thread = new Thread();
                    thread.start();
                    UUID[] uuid = new UUID[1];
                    uuid[0] = UUID.fromString(SampleGattAttributes.ARIVL_BOX);
                    mHandler.postDelayed(new Runnable() {
                        @Override
                        public void run() {
                            mScanning = false;
                            mBluetoothAdapter.stopLeScan(mLeScanCallback);
                            invalidateOptionsMenu();
                        }
                    }, SCAN_PERIOD);
                    mScanning = true;
                    mBluetoothAdapter.startLeScan(uuid, mLeScanCallback);
                } else {
                    mScanning = false;
                    mBluetoothAdapter.stopLeScan(mLeScanCallback);
                }
                invalidateOptionsMenu();
            }

            // Adapter for holding devices found through scanning.
             class LeDeviceListAdapter extends BaseAdapter {
                private ArrayList<BluetoothDevice> mLeDevices;
                private LayoutInflater mInflator;

                public LeDeviceListAdapter() {
                    super();
                    mLeDevices = new ArrayList<BluetoothDevice>();
                }

                public void addDevice(BluetoothDevice device) {
                    if (!mLeDevices.contains(device)) {
                        if (true) {
                            mLeDevices.add(device);
                            final Intent intent = new Intent(getApplicationContext(), DeviceControlActivity.class);
                            intent.putExtra(DeviceControlActivity.EXTRAS_DEVICE_NAME, device.getName());
                            intent.putExtra(DeviceControlActivity.EXTRAS_DEVICE_ADDRESS, device.getAddress());
                            if (mScanning) {
                                mBluetoothAdapter.stopLeScan(mLeScanCallback);
                                mScanning = false;
                            }
                            startActivity(intent);
                            Toast toast = Toast.makeText(context, "ArivlBox was found!", Toast.LENGTH_SHORT);
                            toast.show();
                        }
                    }
                }


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
                    com.example.android.arivl.DeviceScanActivity.ViewHolder viewHolder;
                    // General ListView optimization code.
                    if (view == null) {
                        view = mInflator.inflate(R.layout.listitem_device, null);

                        viewHolder = new com.example.android.arivl.DeviceScanActivity.ViewHolder();
                        viewHolder.deviceAddress = (TextView) view.findViewById(R.id.device_address);
                        viewHolder.deviceName = (TextView) view.findViewById(R.id.device_name);
                        view.setTag(viewHolder);
                    } else {
                        viewHolder = (com.example.android.arivl.DeviceScanActivity.ViewHolder) view.getTag();
                    }

                    BluetoothDevice device = mLeDevices.get(i);
                    final String deviceName = device.getName();
                    if (deviceName != null && deviceName.length() > 0)
                        viewHolder.deviceName.setText("ArivlBox");
                    else
                        viewHolder.deviceName.setText(R.string.unknown_device);
                    viewHolder.deviceAddress.setText(device.getAddress());
                    return view;
                }
            }

            // Device scan callback.
            private BluetoothAdapter.LeScanCallback mLeScanCallback =
                    new BluetoothAdapter.LeScanCallback() {

                        @Override
                        public void onLeScan(final BluetoothDevice device, int rssi, final byte[] scanRecord) {
                            if (rssi > -150) {
                                runOnUiThread(new Runnable() {
                                    @Override
                                    public void run() {
                                        mLeDeviceListAdapter.addDevice(device);
                                        mLeDeviceListAdapter.notifyDataSetChanged();
                                    }
                                });
                            }
                        }
                    };

        }
        return START_STICKY;
    }
}