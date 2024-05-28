import {Controller} from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['integerInput','stringInput'];

    connect(){
        super.connect();
        this.integerInputTarget.onblur = this.numberToString.bind(this);
        this.stringInputTarget.onblur = this.stringToNumber.bind(this);
    }

    async numberToString() {
        let integerId = this.integerInputTarget.value;
        if(!integerId){
            return;
        }

        const url = '/debug/number-to-title/' + integerId ;
        const response = await fetch(url, {
            method: "GET"
        })

        const jsonResponse = await response.json();

        this.stringInputTarget.value = jsonResponse[integerId];
    }

    async stringToNumber() {
        let stringId = this.stringInputTarget.value;
        if(!stringId){
            return;
        }

        const url = '/debug/title-to-number/' + stringId ;
        const response = await fetch(url, {
            method: "GET"
        })

        const jsonResponse = await response.json();

        this.integerInputTarget.value = jsonResponse[stringId];
    }
}