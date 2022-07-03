import {useStore} from "vuex";
import {ref, computed} from 'vue';

function infoUser(){
    const store = useStore();

    const partner = ref({});
    const user = ref({});

    return {partner,user};
}

export default infoUser;
