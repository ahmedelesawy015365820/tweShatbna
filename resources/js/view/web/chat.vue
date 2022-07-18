<template>
    <!-- Content -->
    <div class="content">
        <loader2 v-if="loading" />
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 back-text">
                    <router-link
                        :to="{name:'dashboardClient',params: {lang:this.$i18n.locale}}"
                        v-if="admin.role_name.includes('client')"
                        class="btn btn-custom"
                    >
                        <i class="fa fa-chevron-left"></i>
                        Back
                    </router-link>

                    <router-link
                        :to="{name:'dashboardCompany',params: {lang:this.$i18n.locale}}"
                        v-if="admin.role_name.includes('company')"
                        class="btn btn-custom"
                    >
                        <i class="fa fa-chevron-left"></i>
                        Back
                    </router-link>

                    <router-link
                        :to="{name:'dashboardDesign',params: {lang:this.$i18n.locale}}"
                        v-if="admin.role_name.includes('design')"
                        class="btn btn-custom"
                    >
                        <i class="fa fa-chevron-left"></i>
                        Back
                    </router-link>
                </div>
                <div class="col-md-12">

                    <div class="chat-window">

                        <!-- Chat Left -->
                        <div class="chat-cont-left">
                            <div class="chat-header">
                                <form class="chat-search">
                                    <div class="input-group">
                                        <div :class="['input-group-prepend',this.$i18n.locale == 'ar'?'search-ar':'']">
                                            <i class="fas fa-search icon-circle"></i>
                                        </div>
                                        <input
                                               type="text"
                                               class="form-control rounded-pill"
                                               placeholder="Search"
                                               v-model="search"
                                        >
                                    </div>
                                </form>
                            </div>
                            <div class="chat-users-list">
                                <div class="chat-scroll">
                                    <a
                                        href="javascript:void(0);"
                                        @click="showMessage(item.uuid,item.id)"
                                        v-for="item in converstions" :key="item.uuid"
                                        :class="['media','d-flex',item.uuid == uuid? 'active no-event' : '']"
                                    >
                                        <div class="media-img-wrap flex-shrink-0">
                                            <div class="avatar avatar-away" v-for="client in item.users">
                                                <img
                                                    :src="client.imagePath"
                                                    onerror="src='/web/img/img-02.jpg'"
                                                    alt="User Image"
                                                    class="avatar-img rounded-circle"
                                                >
                                            </div>
                                        </div>
                                        <div class="media-body flex-grow-1">
                                            <div>
                                                <div class="user-name" v-for="client in item.users">
                                                    {{ client.name }}
                                                </div>
                                                <div class="user-last-chat">It seems logical that the </div>
                                            </div>
                                            <div>
                                                <div class="last-chat-time block">05 min</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /Chat Left -->

                        <!-- Chat Right -->
                        <div class="chat-cont-right" v-if="show">
                            <div class="chat-header">
                                <a id="back_user_list" href="javascript:void(0)" class="back-user-list">
                                    <i class="material-icons">chevron_left</i>
                                </a>
                                <div class="media d-flex">
                                    <div class="media-img-wrap flex-shrink-0">
                                        <div class="avatar avatar-online">
                                            <img
                                                :src="user.imagePath"
                                                onerror="src='/web/img/img-02.jpg'"
                                                alt="User Image"
                                                class="avatar-img rounded-circle"
                                            >
                                        </div>
                                    </div>
                                    <div class="media-body flex-grow-1">
                                        <div class="user-name">{{ user.name }} </div>
                                        <div class="user-status">online</div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-body">
                                <div class="chat-scroll" ref="hasScrolledToBottom">
                                    <ul class="list-unstyled">

                                        <div v-for="message in converstion">
                                            <li v-if="message.user_id == user_id" class="media received d-flex">
                                                <div class="avatar flex-shrink-0">
                                                    <img
                                                        onerror="src='/web/img/img-02.jpg'"
                                                        :src="`/web/img/user/${admin.id}/${admin.image}`"
                                                        alt="User Image"
                                                        class="avatar-img rounded-circle"
                                                    >
                                                </div>
                                                <div :class="['media-body','flex-grow-1',this.$i18n.locale == 'ar'? 'message-ar':'']">
                                                    <div :class="['msg-box',this.$i18n.locale == 'ar'?'arrow-user':'']">
                                                        <div class="width-message">
                                                            <p>{{message.body}}</p>

                                                            <div class="message" v-if="message.media.length">
                                                                <a :href="`/web/img/${media.file_name}`"
                                                                   download
                                                                   v-for="media in message.media"
                                                                >
                                                                    <img :src="`/web/img/attachment/${media.file_name}`" />
                                                                </a>
                                                            </div>

                                                            <ul class="chat-msg-info">
                                                                <li>
                                                                    <div class="chat-time">
                                                                        <span>10:00 AM</span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li v-else class="media sent d-flex">
                                                <div :class="['avatar ','flex-shrink-0',this.$i18n.locale == 'ar'?'avatar-ar':'']">
                                                    <img
                                                        :src="user.imagePath"
                                                        onerror="src='/web/img/img-05.jpg'"
                                                        alt="User Image"
                                                        class="avatar-img rounded-circle"
                                                    >
                                                </div>
                                                <div class="media-body flex-grow-1">
                                                    <div :class="['msg-box',this.$i18n.locale == 'ar'?'message-client':'']">
                                                        <div class="width-message">
                                                            <p>{{message.body}}</p>

                                                            <div class="message" v-if="message.media.length">
                                                                <a :href="`/web/img/${media.file_name}`"
                                                                   download
                                                                   v-for="media in message.media"
                                                                >
                                                                    <img :src="`/web/img/attachment/${media.file_name}`" />
                                                                </a>
                                                            </div>

                                                            <ul class="chat-msg-info">
                                                                <li>
                                                                    <div class="chat-time">
                                                                        <span>10:02 AM</span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </div>

                                    </ul>
                                </div>
                            </div>
                            <div class="chat-footer">
                                <div class="container-images" id="container-images-1" v-show="numberOfImage"></div>
                                <div class="input-group">
                                    <div class="avatar">
                                        <img
                                            onerror="src='/web/img/img-02.jpg'"
                                            :src="`/web/img/user/${admin.id}/${admin.image}`"
                                            alt="User Image"
                                            class="avatar-img rounded-circle"
                                        >
                                    </div>
                                    <input
                                        type="text"
                                        class="input-msg-send form-control"
                                        placeholder="Reply..."
                                        @keyup.enter="replayFun"
                                        v-model.trim="body"
                                    >
                                    <div class="btn-file btn">
                                        <i class="fa fa-paperclip" @click="showAttchment"></i>
                                        <input
                                            type="file"
                                            id="attachment"
                                            multiple
                                            accept=".png, .gif,.svg, .mav, .jpg, .jpeg"
                                            @change="attachmentFun"
                                        >
                                    </div>
                                    <button @click.prevent="replayFun"
                                            type="button"
                                            class="btn btn-primary msg-send-btn rounded-pill"
                                    >
                                        <i class="fab fa-telegram-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /Chat Right -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
</template>

<script>
import {onMounted,ref,onUpdated,watch,onBeforeMount} from 'vue';
import webApi from "../../api/webAxios";
import { useStore } from 'vuex';

export default {
    name: "chat",
    setup() {

        const store = useStore();
        let loading = ref(false);
        const converstions = ref([]);
        const converstion = ref({});
        const converstion_id = ref(null);
        const user_id = ref(null);
        const user = ref({});
        const admin = ref({});
        const hasScrolledToBottom = ref('');
        const show = ref(false);
        const uuid = ref('');
        const search = ref('');
        const numberOfImage = ref(0);
        const attachment = ref([]);
        let debounce = ref({});

        const body= ref('');

        let getConversation = () => {
            loading.value = true;
            converstions.value = [];
            webApi.get(`/v1/web/conversation`)
                .then((res) => {

                    res.data.data.conversations.forEach((q) => {
                        q.users.forEach((e) => {
                            if(e.id == admin.value.id){
                                let index = q.users.indexOf(e);
                                q.users.splice(index,1);
                            }
                        });

                        converstions.value.push(q);
                    });

                    user_id.value = res.data.data.user;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => {
                    loading.value = false;
                })

        };

        let showMessage = (uid,id) => {

            uuid.value = uid;
            converstion_id.value = id;
            show.value = false;
            converstion.value = [];

            Echo.private(`Conversation.${id}`)
                .listen('MessageAddEvent', (e) => {
                    converstion.value.push({
                        body: e.message.body,
                        media: e.media,
                        user_id: e.message.user_id
                    });
                });

            user.value = converstions.value.find((q) => q.uuid == uuid.value).users[0]

            webApi.get(`/v1/web/conversation/${uid}`)
                .then((res) => {
                    show.value = true;
                    let l = res.data.data.conversation;
                    converstion.value = l;
                })
                .catch((err) => {})

        };

        const scrollBottom = () =>{
            if(converstion.value.length > 0){
                let el = hasScrolledToBottom.value;
                console.log(el.scrollHeight);
                el.scrollTop = el.scrollHeight;
            }
        };

        let showAttchment= () => {document.getElementById('attachment').click();};

        let attachmentFun = (e) => {
            let containerImages = document.querySelector('#container-images-1');
            containerImages.innerHTML = '';
            attachment.value = [];
            numberOfImage.value = e.target.files.length;

            for(let i of e.target.files) {

                attachment.value.push(i);

                let reader = new FileReader();

                let figure = document.createElement('figure');
                figure.setAttribute('class','chat');

                reader.onload = () => {
                    let img = document.createElement('img');
                    img.setAttribute('src',reader.result);
                    figure.appendChild(img);
                }

                containerImages.appendChild(figure);
                reader.readAsDataURL(i);
            }
        };

        let replayFun = () => {

            let containerImages = document.querySelector('#container-images-1');
            const formData = new FormData();
            formData.append('uuid',uuid.value);
            for( var i = 0; i < attachment.value.length; i++ ){
                let file = attachment.value[i];
                formData.append('attachment[' + i + ']', file);
            }
            formData.append('body',body.value);

            body.value = '';
            containerImages.innerHTML = '';
            attachment.value = [];
            numberOfImage.value = 0;

            if(body.value || attachment.value){
                webApi.post(`/v1/web/addmessage`,formData)
                    .then((res) => {})
                    .catch((err) => {
                        console.log(err);
                    })

            }
        };


        onMounted(() => {
            getConversation();
        });

        onBeforeMount(() => {
            admin.value = store.state.auth.user;
        });

        onUpdated(() => {
            scrollBottom();
        });

        watch(search,(search,oldSearch) => {
            clearTimeout(debounce.value);
            debounce.value= setTimeout(() => {
                getConversation();
            },500)
        });

        return {
            converstions,
            admin,
            hasScrolledToBottom,
            converstion,
            user,
            user_id,
            attachment,
            body,
            uuid,
            showMessage,
            show,
            attachmentFun,
            showAttchment,
            replayFun,
            search,
            numberOfImage,
            loading
        };
    }
}
</script>

<style scoped>
.content {
    padding: 110px 0 20px;
}
.chat-cont-right .chat-header .media .media-img-wrap{
    margin: 0 15px !important;
}

.chat-cont-left .chat-users-list a.media .media-img-wrap {
    margin: 0 15px !important;
}

.chat-cont-left .chat-search .input-group .input-group-prepend.search-ar{
    left: 15px;
    right: unset;
}

.chat-cont-right .chat-body .media .media-body.message-ar{
    margin-right: 45px;
}

.chat-cont-right .chat-body .media.received .media-body .msg-box.arrow-user:first-child:before {
    border-bottom: 15px solid #fcb00c;
    border-right: 15px solid transparent;
    border-top: 15px solid transparent;
    border-left: 15px solid #fcb00c;
    right: -10px;
    left: auto;
}

.chat-cont-right .chat-body .media.sent .avatar.avatar-ar{
    right: unset;
    left: 0;
}

.chat-cont-right .chat-body .media.sent .media-body .msg-box.message-client:first-child:before {
    border-bottom: 15px solid #e8efff;
    border-left: 15px solid transparent;
    border-top: 15px solid transparent;
    border-right: 15px solid #e8efff;
    left: 37px;
    right: auto;
}

.btn-custom{
    border: 1px solid #fcb00c;
    border-radius: 10px;
    color: #fcb00c;
    font-weight: 600;
    font-size: 14px;
}

.btn-custom:hover {
    background-color: #fcb00c;
    color: #fff;
}

.chat-cont-right .chat-footer .input-group .btn.msg-send-btn {
    background-color: #c1c1c1;
    border-color: #c1c1c1;
}

.chat-cont-right .chat-footer .input-group .btn.msg-send-btn:hover {
    background-color: #fcb00c;
    border-color: #fcb00c;
}

.width-message{
    min-width: 100px;
    max-width: 375px;
}

.chat-cont-right .chat-body .media.received .media-body .msg-box > div {
    margin: 10px 0;
}

.container-images{
    width: 90%;
    position: relative;
    margin: auto;
    gap: 20px;
    flex-wrap: wrap;
    padding: 10px;
    border-radius: 20px;
    background-color: #f7f7f7;
    margin-bottom: 6px;
}

.message{
    position: relative;
    gap: 20px;
    flex-wrap: wrap;
    padding: 3px;
    border-radius: 10px;
    background-color: #f7f7f7;
    margin-top: 5px;
    display: inline-block;
}

.message img{
    display: inline-block;
    width: 100px;
    margin: 0 5px 4px;
    height: auto;
}

.no-event {
    pointer-events: none;
}


</style>
