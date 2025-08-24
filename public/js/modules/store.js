

export default class Store {


    static get (key) {
        let value = localStorage.getItem(key);
        return value === null ? null : JSON.parse(value);
    }

    static set (key, value) {
        return localStorage.setItem(key, JSON.stringify(value));
    }

    static init(key) {
        if (!Store.isset(key)) {
            Store.set(key, []);
        }
        return Store.get(key);
    }

    static isset(key) {
        return Store.get(key) !== null;
    }

    static clear() {
        return localStorage.clear();
    }
}