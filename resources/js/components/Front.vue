<template>
    <div class="container" :class="{'loading': loading}">
        <div class="row">
            <div class="col-lg-3 mb-4">
                <h1 class="mt-4">Filters</h1>

                <h3 class="mt-2">Categories</h3>
                <div class="form-check" v-for="(category, index) in categories">
                    <input class="form-check-input" type="checkbox" :value="category.id" :id="'category'+index" v-model="selected.categories">
                    <label class="form-check-label" :for="'category' + index">
                        {{ category.name }} ({{ category.issues_count }})
                    </label>
                </div>

                <div class="col-lg-9">
                    <div class="row mt-4">
                        <div class="col-lg-4 col-md-6 mb-4" v-for="issue in issues">
                            <div class="card h-100">
                            <a href="#">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="#">{{ issue.name }}</a>
                                </h4>
                                <p class="card-text">{{ issue.content }}</p>
                            </div>
                        </div>


                           



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data: function () {
            return {
                categories: [],
                issues: [],
                loading: true,
                selected: {
                    categories: []
                }
            }
        },

        mounted() {
            this.loadCategories();
            this.loadIssues();
        },

        watch: {
            selected: {
                handler: function () {
                    this.loadCategories();
                    this.loadIssues();
                },
                deep: true
            }
        },

        methods: {
            loadCategories: function () {
                axios.get('/api/categories', {
                        params: _.omit(this.selected, 'categories')
                    })
                    .then((response) => {
                        this.categories = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            loadIssues: function () {
                axios.get('/api/issues', {
                        params: this.selected
                    })
                    .then((response) => {
                        this.issues = response.data.data;
                        this.loading = false;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

        }
    }
</script>