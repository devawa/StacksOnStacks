package com.example.android.arivl;

import org.robolectric.annotation.Config;
import android.bluetooth.BluetoothAdapter;
import android.os.Handler;
import org.junit.Assert;
import org.junit.Test;
import org.junit.runner.RunWith;
import org.mockito.Mockito;
import org.robolectric.RobolectricTestRunner;
import static android.bluetooth.BluetoothAdapter.*;

@RunWith(RobolectricTestRunner.class)
@Config(constants = BuildConfig.class,sdk=18,manifest = "src/main/AndroidManifest.xml", packageName = "com.example.android.arivl")
public class DeviceScanActivityTest {

      @Test public void isScanning_After_Creation_Should_Return_False() {
          BluetoothAdapter adapter = Mockito.mock(BluetoothAdapter.class);
          LeScanCallback callback = Mockito.mock(LeScanCallback.class);
          com.example.android.arivl.DeviceScanActivity bleDevicesScanner = new com.example.android.arivl.DeviceScanActivity(adapter,callback);
          Assert.assertFalse(bleDevicesScanner.isScanning());
      }

      @Test public void isScanning_After_Start_Should_Return_True() {
          BluetoothAdapter adapter = Mockito.mock(BluetoothAdapter.class);
          LeScanCallback callback = Mockito.mock(LeScanCallback.class);
          Handler handler = Mockito.mock(Handler.class);
          com.example.android.arivl.DeviceScanActivity bleDevicesScanner = new com.example.android.arivl.DeviceScanActivity(adapter,callback);
          bleDevicesScanner.start(handler);
          Assert.assertTrue(bleDevicesScanner.isScanning());
      }

      @Test public void isScanning_After_Starting_Twice_Should_Return_True() {
          BluetoothAdapter adapter = Mockito.mock(BluetoothAdapter.class);
          LeScanCallback callback = Mockito.mock(LeScanCallback.class);
          Handler handler = Mockito.mock(Handler.class);
          com.example.android.arivl.DeviceScanActivity bleDevicesScanner = new com.example.android.arivl.DeviceScanActivity(adapter,callback);
          bleDevicesScanner.start(handler);
          bleDevicesScanner.start(handler);
          Assert.assertTrue(bleDevicesScanner.isScanning());
      }

      @Test public void isScanning_After_Start_And_Stop_Should_Return_False() {
          BluetoothAdapter adapter = Mockito.mock(BluetoothAdapter.class);
          LeScanCallback callback = Mockito.mock(LeScanCallback.class);
          Handler handler = Mockito.mock(Handler.class);
          com.example.android.arivl.DeviceScanActivity bleDevicesScanner = new com.example.android.arivl.DeviceScanActivity(adapter,callback);
          bleDevicesScanner.start(handler);
          bleDevicesScanner.stop(handler);
          Assert.assertFalse(bleDevicesScanner.isScanning());
      }

    @Test public void isScanning_After_Start_Custom_Timeout_Should_Stop() {
        BluetoothAdapter adapter = Mockito.mock(BluetoothAdapter.class);
        LeScanCallback callback = Mockito.mock(BluetoothAdapter.LeScanCallback.class);
        Handler handler = Mockito.mock(Handler.class);
        com.example.android.arivl.DeviceScanActivity bleDevicesScanner = new com.example.android.arivl.DeviceScanActivity(adapter,callback);
        bleDevicesScanner.start(handler);
        Assert.assertTrue(bleDevicesScanner.isScanning());

        //timeout for Mockito in milliseconds
        Mockito.verify(adapter, Mockito.timeout(2000).atLeastOnce()).stopLeScan(bleDevicesScanner.get());
    }
}