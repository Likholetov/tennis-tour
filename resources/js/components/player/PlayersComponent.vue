<template>
    <div class="players__block">
        <div class="mb-2">Поиск</div>
        <form action="#" class="players__form">
            <input
                v-model="fio"
                type="text"
                class="players__input players__input-search"
                placeholder="ФИО"
            />
            <my-select
                v-for="(select, index) in selects"
                :key="index"
                :select="select"
                v-on:result="result"
            ></my-select>
            <!-- <select v-model="level" id="level">
                <option selected value="">Уровень игрока</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select> -->
            <input
                v-model="city"
                type="text"
                class="players__input players__input-search"
                placeholder="Город"
            />
        </form>
        <ul class="players__list">
            <a
                v-for="player in players"
                :href="'/player/' + player.id"
                :key="player.id"
                class="players__item"
            >
                <div class="players__elem">
                    <img
                        style="object-fit: cover"
                        :src="
                            player.img_url
                                ? player.img_url
                                : 'images/dist/avatar.png'
                        "
                        alt=""
                        class="avatar"
                    />
                    <div class="desc">
                        <p class="name">
                            {{ player.surname }} {{ player.name }}
                        </p>
                        <p v-if="player.birth" class="birthday">
                            {{ player.birth }}
                        </p>
                        <div
                            v-if="player.level"
                            class="fourth-place-elem place-elem"
                        >
                            <span class="place">
                                <b>{{ player.level }}</b>
                                <svg
                                    class="medal__icon"
                                    style="enable-background: new 0 0 512 512"
                                    xml:space="preserve"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="28"
                                    height="35"
                                    viewBox="0 0 512 512"
                                >
                                    <g>
                                        <g>
                                            <path
                                                d="M256,107c-51.7,0-93.8,42.2-93.8,94c0,51.9,42.1,94,93.8,94c51.7,0,93.8-42.2,93.8-94C349.8,149.2,307.7,107,256,107
                                             L256,107z M272,253.3c0,8.3-6.7,15-15,15c-8.3,0-15-6.7-15-15v-78.8h-5c-8.3,0-15-6.7-15-15c0-8.3,6.7-15,15-15h20
                                             c8.3,0,15,6.7,15,15V253.3z"
                                            />
                                            <path
                                                d="M444.4,241.1c9.6-10.9,20.5-23.3,20.5-39.7c0-16.3-10.7-28.7-20.3-39.6c-5.4-6.2-11-12.6-12.6-17.8
                                             c-1.5-4.7-0.7-12.9,0-20.8c1.4-14.7,3-31.4-6.8-45c-9.9-13.7-26.2-17.3-40.6-20.5c-7.7-1.7-15.7-3.5-19.7-6.4
                                             c-4.4-3.2-8.7-10.5-12.9-17.6c-7.4-12.5-15.8-26.6-31.3-31.6C305.2-3,290,3.5,276.7,9.2c-7.5,3.2-15.2,6.5-20.4,6.5c0,0,0,0,0,0
                                             c-5.1,0-12.7-3.3-20.1-6.6c-13.4-5.9-28.7-12.5-44.5-7.4c-15.3,4.9-23.6,18.9-31,31.3c-4.3,7.2-8.7,14.6-13.3,17.9
                                             c-4.5,3.3-12.9,5.2-21.1,7c-14,3.2-29.9,6.8-39.3,19.8c-9.7,13.4-8.2,30-6.8,44.6c0.8,8,1.5,16.4,0,21.2
                                             c-1.6,5-7.2,11.3-12.6,17.5C58,172,47.1,184.4,47.1,200.8c0,16.3,10.7,28.7,20.3,39.6c5.4,6.2,11,12.6,12.6,17.8
                                             c1.5,4.7,0.7,12.9,0,20.8c-1.4,14.7-3,31.4,6.8,45c9.9,13.7,26.2,17.3,40.6,20.5c7.7,1.7,15.7,3.5,19.7,6.4
                                             c4.4,3.2,8.7,10.5,12.9,17.6c7.4,12.5,15.8,26.6,31.3,31.6c15.6,5.1,30.8-1.4,44.1-7.2c7.5-3.2,15.2-6.5,20.4-6.5h0
                                             c5.1,0,12.7,3.3,20.1,6.6c10.1,4.4,21.1,9.2,32.7,9.2c3.9,0,7.8-0.5,11.8-1.8c15.3-4.9,23.6-18.9,31-31.3
                                             c4.3-7.2,8.7-14.6,13.2-17.9c4.5-3.3,12.9-5.2,21.1-7c14-3.2,29.9-6.8,39.3-19.8c9.7-13.4,8.2-30,6.8-44.6c-0.8-8-1.5-16.4,0-21.2
                                             C433.4,253.5,439,247.2,444.4,241.1L444.4,241.1z M256,325.1c-68.3,0-123.8-55.6-123.8-124.1S187.7,77,256,77
                                             s123.8,55.6,123.8,124.1S324.3,325.1,256,325.1z"
                                            />
                                        </g>
                                        <g>
                                            <path
                                                d="M241,423.1c-10.7,4.4-23.4,8.8-38.1,8.8c-7.2,0-14.3-1.1-21-3.3c-21.3-6.9-33.8-22.6-42.4-36.1V497c0,4.7,2.2,9.2,6,12
                                             c3.8,2.8,8.7,3.7,13.2,2.4L241,487L241,423.1z"
                                            />
                                            <path
                                                d="M329.6,428.9c-6.7,2.2-13.8,3.3-21,3.3c0,0,0,0,0,0c-14.5,0-27-4.3-37.6-8.7V487l82.2,24.4c1.4,0.4,2.8,0.6,4.3,0.6
                                             c3.2,0,6.4-1,9-3c3.8-2.8,6-7.3,6-12V392C363.9,405.5,351.3,421.8,329.6,428.9z"
                                            />
                                        </g>
                                    </g>
                                </svg>
                            </span>
                            <div class="place-txt">уровень</div>
                        </div>
                    </div>
                </div>
                <div class="players__date">
                    <p v-if="player.start_playing_year">
                        <b> с {{ player.start_playing_year }} г. </b>
                        играет в теннис
                    </p>
                    <p v-if="player.start_tournament_year">
                        <b> с {{ player.start_tournament_year }} г. </b>
                        учавствутет в турнире
                    </p>
                </div>
            </a>
        </ul>
        <div class="players__more">
            <div class="w100 d-flex justify-content-center mt-3">
                <button
                    v-if="laravelData.links && laravelData.links.next"
                    @click="perPagePlus(10)"
                    type="button"
                    class="btn btn-primary btn-lg btn-block"
                >
                    Показать еще
                </button>
            </div>
            <div class="w100 d-flex justify-content-center mt-3">
                <pagination
                    :limit="3"
                    :data="laravelData"
                    @pagination-change-page="getPlayers"
                ></pagination>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    created() {
        this.getPlayers();
    },
    data() {
        return {
            loading: false,
            // filters
            fio: "",
            level: "",
            city: "",
            // sort
            // todo: sort
            // table
            players: [],
            // pagination
            laravelData: {},
            // per page
            perPage: 10,
            selects: [
                {
                    value: "Уровень игрока",
                    list: ["1", "2", "3", "4"],
                },
            ],
        };
    },
    watch: {
        fio: function (val) {
            this.getPlayers();
        },
        level: function (val) {
            this.getPlayers();
        },
        city: function (val) {
            this.getPlayers();
        },
        perPage: function (val) {
            console.log(val);
            this.getPlayers();
        },
    },
    methods: {
        result(item) {
            this.level = item;
        },
        perPagePlus(count) {
            this.perPage += count;
        },
        getPlayers(page = 1) {
            axios
                .get("/api/players?page=" + page, {
                    params: {
                        fio: this.fio,
                        level: this.level,
                        city: this.city,
                        per_page: this.perPage,
                    },
                })
                .then((resp) => {
                    console.log(resp.data);
                    this.players = resp.data.data;
                    this.laravelData = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                });
        },
    },
};
</script>

<style></style>
