pragma solidity ^0.5.17;

contract SimpleStorage {
  bytes32 storedData;

  function set(bytes32 x) public {
    storedData = x;
  }

  function get() public view returns (bytes32) {
    return storedData;
  }
}
