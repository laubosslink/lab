# Broker

Protocol Version: 1.0

## Commands

### HEADER

This command must be call in first. Ensure that you talk in the same protocol.

```
BROKER/1.0
200 Success
```

### LIST_LIBRARIES

```
LIST_LIBRARIES
200 library1,library2,...
```

### LOAD

```
LOAD library
200 Success
```

Load the library on the server.

### SET_PARAM

Depend of the library. See  /doc/third/library.md to know the different parameters.

```
SET_PARAM parameter value
200 Success
```

You could use raw_value to send more than online data.

```
SET_PARAM parameter RAW_VALUE_ANNOUNCMENT
BEGIN_RAW_VALUE
W55IGNhcm5hbCBwbGVhc3VyZS4=
END_RAW_VALUE
200 Success
```
**Note**: You need to send data with base64 encooding.


### RUN
```
RUN
200 Success
```

Will start the process on the selected library with the added parameters.

**IMPORTANT**: If you try again/another action on the same file, you need to manage on client (check DB, if there is a filepath with status != FINISHED). This is dirty, but no choice with the current architecture.

### STATUS

To implement.

### BYE

To implement.

## Return Status

Status code signification:
  * 0 to 999 represent status from Broker.
  * 0 to 299 means success
  * 300 to 399 means info
  * 400 to 499 means warning
  * 500 to 999 means error
  * 1000+ represent error status code from Library. The signification status code depend on the library.

### 200

This happen when the command has been sending correctly.

### 400

This could be happen when a command doesn't exist.

### 500

This could be happen when there is a problem on server program.

### 999

This status could happen when no status is find concern the problem
