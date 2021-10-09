<template>
    <div class="container">
        <p>
            <router-link :to="{ name: 'grid' }">Grid</router-link> |
            <router-link :to="{ name: 'departments' }">Departments</router-link> |
            <router-link :to="{ name: 'employees' }">Employees</router-link>
        </p>
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import Departments from "./components/Departments";
import Employees from "./components/Employees";
export default {
    components: {Employees, Departments}
}

</script>

<style scoped>
.container {
    display: flex;
    flex-direction: column;
    align-items: center;
}
</style>
