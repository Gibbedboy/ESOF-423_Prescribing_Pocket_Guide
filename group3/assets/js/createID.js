//finds a unique ID
function uniqueid() {
    var ALPHABET = '023456789abcdefghijkmnopqrstuvwxyz';//no l, 1, or uppercases here
    var ID_LENGTH = 12;
    var rtn = '';
    for (var i = 0; i < ID_LENGTH; i++) {
      rtn += ALPHABET.charAt(Math.floor(Math.random() * ALPHABET.length));
    }
    return rtn;
}