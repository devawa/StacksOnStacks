package com.example.android.arivl;

import org.junit.Assert;
import org.junit.Test;
import org.junit.runner.RunWith;
import org.robolectric.RobolectricTestRunner;

import static android.bluetooth.BluetoothGatt.*;

@RunWith(RobolectricTestRunner.class)
public class SampleGattAttributesTest {

    @Test
    public void toString_Of_A_Known_Status_Should_Not_Be_Null() {
        Assert.assertNotNull(com.example.android.arivl.SampleGattAttributes.toString(GATT_FAILURE));
        Assert.assertNotNull(com.example.android.arivl.SampleGattAttributes.toString(GATT_INSUFFICIENT_AUTHENTICATION));
        Assert.assertNotNull(com.example.android.arivl.SampleGattAttributes.toString(GATT_INSUFFICIENT_ENCRYPTION));
        Assert.assertNotNull(com.example.android.arivl.SampleGattAttributes.toString(GATT_INVALID_ATTRIBUTE_LENGTH));
        Assert.assertNotNull(com.example.android.arivl.SampleGattAttributes.toString(GATT_INVALID_OFFSET));
        Assert.assertNotNull(com.example.android.arivl.SampleGattAttributes.toString(GATT_READ_NOT_PERMITTED));
        Assert.assertNotNull(com.example.android.arivl.SampleGattAttributes.toString(GATT_REQUEST_NOT_SUPPORTED));
        Assert.assertNotNull(com.example.android.arivl.SampleGattAttributes.toString(GATT_SUCCESS));
        Assert.assertNotNull(com.example.android.arivl.SampleGattAttributes.toString(GATT_WRITE_NOT_PERMITTED));
    }
}