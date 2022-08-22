<template>
    <div class="application-container">
        <aside v-if="!config.chating">
            <div class="top">
                <h2>Chats</h2>
            </div>
            <div class="aside">
                <div class="message" @click="showUserChat()" v-for="i in 5">
                    <div class="photo">
                        <img src="../assets/logo.png">
                    </div>
                    <div class="name">
                        <b>Alejandro Cubillos</b>
                    </div>
                    <div class="time">4:34 p.m</div>
                    <div class="count">
                        <span>3</span>
                    </div>
                    <div class="text">Perra hpta ♥ </div>
                    <div class="read">✓✓</div>
                </div>
            </div>
        </aside>
        <main v-else>
            <div class="top">
                <div class="back"
                @click="goToHome()"><span><</span></div>
                <div class="photo">
                    <img src="../assets/logo.png">
                </div>
                <div class="name">
                    Alejandro Cubillos Contreras
                </div>
            </div>
            <div class="chats-container">
                <div v-for="message in messages"
                class="message-wrapper" :class="{'recived': !message.own}">
                    <div class="message">
                        <div class="image" v-if="message.image"><img :src="getImgUrl(message.image)"></div>
                        <div class="text">{{message.content}}</div>
                        <div class="time">{{message.time}}</div>
                        <div class="read" :class="{'readed': message.read}">✓✓</div>
                    </div>
                </div>
            </div>
            <div class="chat-message">
                <div class="chat-box">
                    <input type="file" id="message-image" style="display:none">
                    <textarea v-model="message.content"></textarea>
                    <label for="message-image" class="file">
                        file
                    </label>
                </div>
                <div class="send" @click="sendMessage()">
                    send
                </div>
            </div>
        </main>
    </div>
</template>
<script>
export default {
    data: function(){
        return {
            message: {
                content:'',
                file: []
            },
            config: {
                chating: true
            },
            messages: [
                {
                    "content": "Hola",
                    "own":     true,
                    "read":    true,
                    "image":   'imagen.png',
                    "time":    "4:32 p.m",
                },
                {
                    "content": "Como estás?",
                    "own":     false,
                    "read":    true,
                    "image":   false,
                    "time":    "4:35 p.m",
                }
            ]
        }
    }, 
    methods: {
        showUserChat(){this.config.chating = true;},
        goToHome(){this.config.chating = false;},
        sendMessage(){
            let date = new Date();
            let hours = date.getHours();
            let ext = 'p.m';
            if(hours > 12) hours = hours - 12;
            else ext = 'a.m';
            let minutes = date.getMinutes();
            if(minutes < 10) minutes = '0'+minutes;
            let time = hours + ':' + minutes + ext;
            

            let file = document.getElementById('message-image').files[0];
            //if(file) this.message.file = file;
            if(file) file = 'imagen.png'
            this.messages.push({content:this.message.content, own:true, read: false, image: file, time});
            document.getElementById('message-image').value = '';
            this.message.content = '';
        },
        getImgUrl(image) {
            return require('../assets/img/'+image)
        }
    },
}
</script>