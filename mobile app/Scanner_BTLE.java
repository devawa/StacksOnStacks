package com.example.tyler.myapplication;

import android.bluetooth.BluetoothAdapter;
import android.bluetooth.BluetoothClass;
import android.bluetooth.BluetoothDevice;
import android.bluetooth.BluetoothManager;
import android.content.Context;
import android.content.Intent;
import android.app.Service;
import android.bluetooth.BluetoothGatt;
import android.bluetooth.BluetoothGattCallback;
import android.bluetooth.BluetoothGattCharacteristic;
import android.bluetooth.BluetoothGattDescriptor;
import android.bluetooth.BluetoothGattService;
import android.bluetooth.BluetoothProfile;
import android.os.Handler;
import android.os.Binder;
import android.os.IBinder;

import java.util.List;
import java.util.UUID;

/**
 * Created by Stacks on Stacks on 2018-03-23.
 * @version 1.0
 */


public class Scanner_BTLE extends Service {
    private Welcome_User ma;
    private DeviceControl maa;
    protected BluetoothAdapter mBluetoothAdapter;
    private BluetoothManager mBluetoothManager;
    private String mBluetoothDeviceAddress;
    private BluetoothGatt mBluetoothGatt;
    protected boolean mScanning;
    private Handler mHandler;
    private long scanPeriod;
    private int signalStrength;

    private static final int STATE_DISCONNECTED=0;
    private static final int STATE_CONNECTING =1;
    private static final int STATE_CONNECTED=2;

    public final static String ACTION_GATT_CONNECTED="com.example.bluetooth.le.ACTION_GATT_CONNECTED";
    public final static String ACTION_GATT_DISCONNECTED="com.example.bluetooth.le.ACTION_GATT_DISCONNECTED";
    public final static String ACTION_GATT_SERVICES_DISCOVERED="com.example.bluetooth.le.ACTION_GATT_SERVICES_DISCOVERED";
    public final static String ACTION_DATA_AVAILABLE="com.example.bluetooth.le.ACTION_DATA_AVAILABLE";
    public final static String EXTRA_DATA="com.example.bluetooth.le.EXTRA_DATA";
    private int mConnectionState = STATE_DISCONNECTED;

    /**
     *
     * @param welcomeActivity reference to the activity using this function
     * @param scanPeriod the amount of time that the central searches for a peripheral
     * @param signalStrength the signal strength range
     */
    public Scanner_BTLE(Welcome_User welcomeActivity, long scanPeriod , int signalStrength){
        ma = welcomeActivity;
        mHandler = new Handler();
        this.scanPeriod = scanPeriod;
        this.signalStrength =signalStrength;
        final BluetoothManager bluetoothManager =
                (BluetoothManager) ma.getSystemService(Context.BLUETOOTH_SERVICE);
        mBluetoothAdapter = bluetoothManager.getAdapter();

    }
    public Scanner_BTLE(DeviceControl welcomeActivity, long scanPeriod , int signalStrength){
        maa = welcomeActivity;
        mHandler = new Handler();
        this.scanPeriod = scanPeriod;
        this.signalStrength =signalStrength;
        final BluetoothManager bluetoothManager =
                (BluetoothManager) maa.getSystemService(Context.BLUETOOTH_SERVICE);
        mBluetoothAdapter = bluetoothManager.getAdapter();

    }
    /**
     * @return boolean to notify whether device is scanning for bluetooth or not
     */
    public boolean isScanning(){return mScanning;}

    /**
     *  checks if user's bluetooth is switched on, if not prompts user to turn it on
     */
    public void start(){
        if(!Utils.checkBluetooth(mBluetoothAdapter)){
            Utils.requestUsersBluetooth(ma);
            ma.stopScan();
        }else{
            scanLeDevice(true);
        }
    }
    public void stop(){
        scanLeDevice(false);
    }

    /**
     *
     * @param enable a boolean variable giving the go ahead to scan for Low Energy devices
     */
    private void scanLeDevice(final boolean enable){
        if(enable && !mScanning){ // CODE CHANGE HERE = true ie.!mScanning
            Utils.toast(ma.getApplication(),"Starting BLE Scan...");
            mHandler.postDelayed(new Runnable(){
                @Override
                public void run(){
                    Utils.toast(ma.getApplicationContext(),"Stopping BLE Scan");
                    mScanning = false;
                    mBluetoothAdapter.stopLeScan(mLeScanCallback);
                    ma.stopScan();
                }

            },scanPeriod);
            mScanning=true;
            mBluetoothAdapter.startLeScan(mLeScanCallback);//(new UUID[] {UUID_HEART_RATE_MEASUREMENT},mLeScanCallback);

        }
    }

    protected BluetoothAdapter.LeScanCallback mLeScanCallback=
            new BluetoothAdapter.LeScanCallback(){
                @Override
                public void onLeScan(final BluetoothDevice device, int rssi, byte[] scanRecord) {
                    final int new_rssi =rssi;
                    if(rssi > signalStrength){
                        mHandler.post(new Runnable(){
                            @Override
                            public void run(){
                                ma.addDevice(device,new_rssi);
                            }
                        });
                    }
                }

            };

    /**
     * Moving onto connecting and communicating with a GATT Server
     *
     */
    public final static UUID UUID_HEART_RATE_MEASUREMENT =
            UUID.fromString(SampleGattAttributes.HEART_RATE_MEASUREMENT);

    /**
     * Implementing callback methods for GATT events that the app cares about like connection change and services discovered
     */
    private final BluetoothGattCallback mGattCallBack = new BluetoothGattCallback() {
        @Override
        public void onConnectionStateChange(BluetoothGatt gatt, int status, int newState) {
          //  super.onConnectionStateChange(gatt, status, newState);
            String intentAction;
            if(newState == BluetoothProfile.STATE_CONNECTED){
                intentAction = ACTION_GATT_CONNECTED;
                mConnectionState = STATE_CONNECTED;
                broadcastUpdate(intentAction);
                //attempts to discover services after succesful connection
                mBluetoothGatt.discoverServices();

            }else if(newState==BluetoothProfile.STATE_DISCONNECTED){
                intentAction=ACTION_GATT_DISCONNECTED;
                mConnectionState=STATE_DISCONNECTED;
                broadcastUpdate(intentAction);
            }
        }

        @Override
        public void onServicesDiscovered(BluetoothGatt gatt, int status) {
            //super.onServicesDiscovered(gatt, status);
            if(status==BluetoothGatt.GATT_SUCCESS){
                broadcastUpdate(ACTION_GATT_SERVICES_DISCOVERED);
            }else{

            }
        }

        @Override
        public void onCharacteristicRead(BluetoothGatt gatt, BluetoothGattCharacteristic characteristic, int status) {
            //super.onCharacteristicRead(gatt, characteristic, status);
            if(status==BluetoothGatt.GATT_SUCCESS){
                broadcastUpdate(ACTION_DATA_AVAILABLE,characteristic);
            }
        }

        @Override
        public void onCharacteristicChanged(BluetoothGatt gatt, BluetoothGattCharacteristic characteristic) {
            //super.onCharacteristicChanged(gatt, characteristic);
            broadcastUpdate(ACTION_DATA_AVAILABLE,characteristic);
        }
    };
    private void broadcastUpdate(final String action){
        final Intent intent = new Intent(action);
        sendBroadcast(intent);
    }

    private void broadcastUpdate(final String action, final BluetoothGattCharacteristic characteristic){
        final Intent intent = new Intent(action);
        /**
         * this is special handling for the heart rate measurement profile. data parsing is
         * carried out as per profile specs
         * http://developer.bluetooth.org/gatt/characteristics/Pages/CharacteristicViewer.aspx?u=org.bluetooth.characteristic.heart_rate_measurement.xml
         */
        if(UUID_HEART_RATE_MEASUREMENT.equals(characteristic.getUuid())){
            int flag = characteristic.getProperties();
            int format = -1;
            if((flag&0x01)!=0){
                format = BluetoothGattCharacteristic.FORMAT_UINT16;
            }else{
                format = BluetoothGattCharacteristic.FORMAT_UINT8;
            }
            final int heartRate = characteristic.getIntValue(format,1);
            intent.putExtra(EXTRA_DATA,String.valueOf(heartRate));
        }else{
            /**
             * for all other profiles, writes the data formatted in HEX
             */
            final byte [] data = characteristic.getValue();
            if(data!=null&&data.length>0){
                final StringBuilder stringBuilder = new StringBuilder(data.length);
                for(byte byteChar : data){
                    stringBuilder.append(String.format("%02X",byteChar));
                }
                intent.putExtra(EXTRA_DATA,new String(data)+"\n"+ stringBuilder.toString());
            }
        }sendBroadcast(intent);
    }


    public class LocalBinder extends Binder{
        Scanner_BTLE getService(){
            return Scanner_BTLE.this;
        }
    }

    @Override
    public IBinder onBind(Intent intent){return mBinder;}

    @Override
    public boolean onUnbind(Intent intent){
        close();
        return super.onUnbind(intent);
    }


    private final IBinder mBinder = new LocalBinder();

    public boolean initialize(){
        if(mBluetoothManager==null){
            mBluetoothManager = (BluetoothManager) getSystemService(Context.BLUETOOTH_SERVICE);
            if(mBluetoothManager==null){return false;}
        }
        mBluetoothAdapter = mBluetoothManager.getAdapter();
        if(mBluetoothAdapter==null){return false;}
        Utils.toast(getApplicationContext(),"initialise entered");
        return true;
    }


    /**
     * Connects to the GATT server hosted on the Bluetooth LE device
     * @param address
     * @return Return true if connection initialized
     */
    public boolean connect(final String address){
        if(mBluetoothAdapter==null||address==null){
            return false;
        }

        /**
         * previously connected device. try to reconnect
         */
        if(mBluetoothDeviceAddress != null && address.equals(mBluetoothDeviceAddress)&&mBluetoothGatt!=null){
            if(mBluetoothGatt.connect()){
                mConnectionState = STATE_CONNECTING;
                return true;
            }else{return false;}
        }
        final BluetoothDevice device = mBluetoothAdapter.getRemoteDevice(address);
        if(device==null){
            //device not found
            return false;
        }
        mBluetoothGatt = device.connectGatt(this,false,mGattCallBack);
        /* potential issue here as 'this' was denied as first argument */
        mBluetoothDeviceAddress=address;
        mConnectionState=STATE_CONNECTING;
        return true;
    }
    /**
     * disconnects an existing connection
     */
    public void disconnect(){
        if(mBluetoothAdapter==null || mBluetoothGatt==null){
            return;
        }mBluetoothGatt.disconnect();
    }

    public void close(){
        if(mBluetoothGatt==null){
            return;
        }
    }

    /**
     * Request a read on a given asynchronously through the callback
     * @param characteristic The characteristic to read from
     */
    public void readCharacteristic(BluetoothGattCharacteristic characteristic){
        if(mBluetoothAdapter==null || mBluetoothGatt==null){
            return;
        }
        mBluetoothGatt.readCharacteristic(characteristic);
    }

    public void setCharacteristicNotification(BluetoothGattCharacteristic characteristic, boolean enabled){
        if(mBluetoothAdapter==null || mBluetoothGatt==null){
            return ;
        }
        mBluetoothGatt.setCharacteristicNotification(characteristic,enabled);


        /**
         * specific to heart rate meseaurement
         */
        if(UUID_HEART_RATE_MEASUREMENT.equals(characteristic.getUuid())){
            BluetoothGattDescriptor descriptor = characteristic.getDescriptor(
                    UUID.fromString(SampleGattAttributes.CLIENT_CHARACTERISTIC_CONFIG)
            );
            descriptor.setValue(BluetoothGattDescriptor.ENABLE_NOTIFICATION_VALUE);
            mBluetoothGatt.writeDescriptor(descriptor);
        }
    }

    public List<BluetoothGattService> getSupportedGattServices(){
        if(mBluetoothGatt==null){return null;}
        return mBluetoothGatt.getServices();
    }
}
