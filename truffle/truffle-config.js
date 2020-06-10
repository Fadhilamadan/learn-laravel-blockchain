/*
|--------------------------------------------------------------------------
| Truffle Configuration
|--------------------------------------------------------------------------
|
| See http://truffleframework.com/docs/advanced/configuration
|
*/

module.exports = {
    networks: {
        development: {
            host: '127.0.0.1',
            port: 7545,
            network_id: '*'
        }
    },
    compilers: {
        solc: {
            version: '^0.5.0',
            docker: false,
            parser: 'solcjs'
        }
    }
};
