<template>
    <div class="card">
    <div class="row">
        <div class="col-md-2">
            <img src="http://via.placeholder.com/84x84&text=..." alt="course.name" class="card-img" />
        </div>
    <div class="col-md-8">
        <div class="card-body">
            <ul class="nav nav-pills card-header-pills" v-if="course.subjects">
                <li  class="nav-item" v-for="subject in course.subjects">
                    <span class="nav-link">{{ subject.name }} </span>
                </li>
            </ul>
            <h4 class="card-title">{{ course.name }}</h4>
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item"><span class="nav-link">{{ course.formattedAccess }}</span></li>
                <li class="nav-item"><span class="nav-link">{{ course.formattedDifficulty }}</span></li>
                <li class="nav-item"><span class="nav-link">{{ course.formattedType }}</span></li>
                <li class="nav-item"><span class="nav-link">{{ course.formattedStarted }}</span></li>
            </ul>
        </div>
    </div>
    </div>
    </div>
</template>

<script>
    export default {
       props: [
           'course'
       ]
    }
</script>

<style scoped>

</style>
