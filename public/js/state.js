/**
 * State class for managing states.
 */
 class State {
    #value = null;
    constructor(initValue) {
        if (initValue != null) this.#value = initValue;
    }
    /**
     * Get the state value.
     * @returns *
     */
    getValue() {
        return this.#value;
    }

    /**
     * Set the state value and dispatch event if eventName given.
     * @param {any} newValue 
     * @param {String} eventName 
     */
    setValue(newValue, eventName = null) {
        this.#value = newValue;
        if (eventName) window.dispatchEvent(new Event(eventName));
    }
}

export default State