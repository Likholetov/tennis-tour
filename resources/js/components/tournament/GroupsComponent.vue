<template>
    <div class="row">
        <div class="col-12 mb-3">
            <a href="/admin/calendar" class="btn btn-secondary">Назад</a>
            <button
                @click="save"
                type="button"
                class="btn btn-success float-right"
            >
                Сохранить
            </button>
        </div>
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Группы</h3>

                    <div class="card-tools">
                        <button
                            type="button"
                            class="btn btn-tool"
                            data-card-widget="collapse"
                            title="Collapse"
                        >
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body"></div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</template>

<script>
export default {
    created() {
        if (groups) {
            const parsedGroups = JSON.parse(this.groups);
        }
    },
    props: ["groups"],
    data() {
        return {
            // players
            players: [],
        };
    },
    watch: {},
    methods: {
        save() {
            /*console.log(this.time);
            const arrayOfStrings = this.time.split(":");
            const hours = parseInt(arrayOfStrings[0]);
            const minutes = parseInt(arrayOfStrings[1]);
            let newDateObj = moment(this.start).add(minutes, "m").toDate();
            newDateObj = moment(this.start).add(hours, "h").toDate();

            axios
                .post("/admin/tournament", {
                    title: this.title,
                    started_at: new Date(newDateObj),
                    category_id: this.category_id,
                    rank: this.rank,
                    place: this.place,
                    groups: this.groups,
                })
                .then((res) => {
                    window.location.href = `/admin/calendar`;
                    console.log(res);
                })
                .catch((err) => {
                    //this.loading = false;
                    console.log(err);
                });*/
        },
    },
};
</script>
