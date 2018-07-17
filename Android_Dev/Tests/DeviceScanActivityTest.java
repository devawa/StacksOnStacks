package com.example.android.arivl;

import static org.junit.Assert.*;
import android.annotation.TargetApi;
import android.bluetooth.BluetoothAdapter;
import android.os.Build;
import org.junit.Assert;
import org.junit.Test;
import org.junit.runner.RunWith;
import org.mockito.Mockito;
import org.robolectric.RobolectricTestRunner;

import static android.bluetooth.BluetoothAdapter.*;

@RunWith(RobolectricTestRunner.class)
public class DeviceScanActivityTest {
    @Test public void isScanning_afterCreation_shouldReturnFalse() {
        BluetoothAdapter adapter = Mockito.mock(BluetoothAdapter.class);
        LeScanCallback callback = Mockito.mock(LeScanCallback.class);
        com.example.android.arivl.DeviceScanActivity bleDevicesScanner = new com.example.android.arivl.DeviceScanActivity();//(adapter, callback);
        Assert.assertFalse(bleDevicesScanner.isScanning());
    }

    @Test public void isScanning_afterStart_shouldReturnTrue() {
        BluetoothAdapter adapter = Mockito.mock(BluetoothAdapter.class);
        LeScanCallback callback = Mockito.mock(LeScanCallback.class);
        com.example.android.arivl.DeviceScanActivity bleDevicesScanner = new com.example.android.arivl.DeviceScanActivity(); //io.relayr.android.ble.BleDevicesScanner(adapter, callback);
        bleDevicesScanner.start();
        Assert.assertTrue(bleDevicesScanner.isScanning());
    }

    @Test public void isScanning_afterStartingTwice_shouldReturnTrue() {
        BluetoothAdapter adapter = Mockito.mock(BluetoothAdapter.class);
        LeScanCallback callback = Mockito.mock(LeScanCallback.class);
        com.example.android.arivl.DeviceScanActivity bleDevicesScanner = new com.example.android.arivl.DeviceScanActivity(); ///io.relayr.android.ble.BleDevicesScanner(adapter, callback);
        bleDevicesScanner.start();
        bleDevicesScanner.start();
        Assert.assertTrue(bleDevicesScanner.isScanning());
    }

    @Test public void isScanning_afterStartAndStop_shouldReturnFalse() {
        BluetoothAdapter adapter = Mockito.mock(BluetoothAdapter.class);
        LeScanCallback callback = Mockito.mock(LeScanCallback.class);
        com.example.android.arivl.DeviceScanActivity bleDevicesScanner = new com.example.android.arivl.DeviceScanActivity(); //io.relayr.android.ble.BleDevicesScanner(adapter, callback);
        bleDevicesScanner.start();
        bleDevicesScanner.stop();
        Assert.assertFalse(bleDevicesScanner.isScanning());
    }

    @Test public void isScanning_afterStartCustomTimeout_shouldStop() {
        BluetoothAdapter adapter = Mockito.mock(BluetoothAdapter.class);
        LeScanCallback callback = Mockito.mock(LeScanCallback.class);
        com.example.android.arivl.DeviceScanActivity bleDevicesScanner = new com.example.android.arivl.DeviceScanActivity();//io.relayr.android.ble.BleDevicesScanner(adapter, callback);
        //bleDevicesScanner.setScanPeriod(1);//in seconds
        bleDevicesScanner.start();
        Assert.assertTrue(bleDevicesScanner.isScanning());

        //timeout for Mockito in milliseconds
        Mockito.verify(adapter, Mockito.timeout(2000).atLeastOnce()).stopLeScan(bleDevicesScanner.get());
    }
}