package com.example.android.arivl;

import org.robolectric.RuntimeEnvironment;
import org.robolectric.annotation.Config;
import android.bluetooth.BluetoothAdapter;
import android.bluetooth.BluetoothGatt;
import android.bluetooth.BluetoothManager;
import android.content.Context;

import org.junit.Assert;
import org.junit.Test;
import org.junit.runner.RunWith;
import org.mockito.Mockito;
import org.robolectric.RobolectricTestRunner;
import static org.mockito.Mockito.spy;
import static org.mockito.Mockito.when;

@RunWith(RobolectricTestRunner.class)
@Config(constants = BuildConfig.class,sdk=18,manifest = "src/main/AndroidManifest.xml", packageName = "com.example.android.arivl")
public class BluetoothLeServiceTest{
    @Test
     public void connection_test_passed(){
        BluetoothAdapter adapter = Mockito.mock(BluetoothAdapter.class);
        BluetoothGatt gatt = Mockito.mock(BluetoothGatt.class);
        when(gatt.connect()).thenReturn(true);
        com.example.android.arivl.BluetoothLeService leService = new com.example.android.arivl.BluetoothLeService(adapter,gatt);
        Assert.assertTrue(leService.connect("Arivl"));
    }

    @Test
    public void connection_test_failed(){
        BluetoothAdapter adapter = Mockito.mock(BluetoothAdapter.class);
        BluetoothGatt gatt = Mockito.mock(BluetoothGatt.class);
        when(gatt.connect()).thenReturn(true);
        com.example.android.arivl.BluetoothLeService leService = new com.example.android.arivl.BluetoothLeService();
        Assert.assertFalse(leService.connect("Arivl"));
    }

    @Test
    public void initialization_Test_Pass(){
        Context context = spy(RuntimeEnvironment.application);
        BluetoothManager manager = Mockito.mock(BluetoothManager.class);
        when(manager.getAdapter()).thenReturn(Mockito.mock(BluetoothAdapter.class));
        com.example.android.arivl.BluetoothLeService leService = new com.example.android.arivl.BluetoothLeService(manager);
        Assert.assertTrue(leService.initialize(context));
    }

    @Test
    public void initialization_Test_Failed(){
        Context context = spy(RuntimeEnvironment.application);
        BluetoothManager manager = Mockito.mock(BluetoothManager.class);
        BluetoothManager service = Mockito.mock(BluetoothManager.class);
        when(context.getSystemService(Context.BLUETOOTH_SERVICE)).thenReturn(service);
        com.example.android.arivl.BluetoothLeService leService = new com.example.android.arivl.BluetoothLeService();
        Assert.assertFalse(leService.initialize(context));
    }
}