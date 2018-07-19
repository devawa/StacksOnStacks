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

import android.bluetooth.BluetoothGatt;

import java.util.HashMap;

/**
 * This class includes a small subset of standard GATT attributes for demonstration purposes.
 */

public class SampleGattAttributes {
    private static HashMap<String, String> attributes = new HashMap();
    public static String ARIVL_BOX = "0000FFE0-0000-1000-8000-00805F9B34FB";
    public static String ARIVL_CHAR = "0000FFE1-0000-1000-8000-00805F9B34FB";
    static {
        // Sample Services.
        attributes.put("0000180d-0000-1000-8000-00805f9b34fb", "Heart Rate Service");
        attributes.put("0000180a-0000-1000-8000-00805f9b34fb", "Device Information Service");
        // Sample Characteristics.
        attributes.put("00002a29-0000-1000-8000-00805f9b34fb", "Manufacturer Name String");
    }

    public static String lookup(String uuid, String defaultName) {
        String name = attributes.get(uuid);
        return name == null ? defaultName : name;
    }


    public static final int GATT_FAILURE_BINDING_REQUIRED = 133;

    public static String toString(int status) {
        switch (status) {
            case BluetoothGatt.GATT_FAILURE: {
                return "Failure";
            }
            case BluetoothGatt.GATT_INSUFFICIENT_AUTHENTICATION: {
                return "Insufficient authentication for a given operation";
            }
            case BluetoothGatt.GATT_INSUFFICIENT_ENCRYPTION: {
                return "Insufficient encryption for a given operation";
            }
            case BluetoothGatt.GATT_INVALID_ATTRIBUTE_LENGTH: {
                return "A write operation exceeds the maximum length of the attribute";
            }
            case BluetoothGatt.GATT_INVALID_OFFSET: {
                return "A read or write operation was requested with an invalid offset";
            }
            case BluetoothGatt.GATT_READ_NOT_PERMITTED: {
                return "GATT read operation is not permitted";
            }
            case BluetoothGatt.GATT_REQUEST_NOT_SUPPORTED: {
                return "The given request is not supported";
            }
            case BluetoothGatt.GATT_SUCCESS: {
                return "A GATT operation completed successfully";
            }
            case BluetoothGatt.GATT_WRITE_NOT_PERMITTED: {
                return "GATT write operation is not permitted";
            }
            case GATT_FAILURE_BINDING_REQUIRED: {
                return "GATT failure: pairing required";
            }
            default: return "Not identified error";
        }
    }

    public static boolean isFailureStatus(int status) {
        switch (status) {
            case BluetoothGatt.GATT_FAILURE:
            case BluetoothGatt.GATT_INSUFFICIENT_AUTHENTICATION:
            case BluetoothGatt.GATT_INSUFFICIENT_ENCRYPTION:
            case BluetoothGatt.GATT_INVALID_ATTRIBUTE_LENGTH:
            case BluetoothGatt.GATT_INVALID_OFFSET:
            case BluetoothGatt.GATT_READ_NOT_PERMITTED:
            case BluetoothGatt.GATT_REQUEST_NOT_SUPPORTED:
            case BluetoothGatt.GATT_WRITE_NOT_PERMITTED:
            case GATT_FAILURE_BINDING_REQUIRED:
                return true;
            case BluetoothGatt.GATT_SUCCESS:
            default: return false;
        }
    }
}
