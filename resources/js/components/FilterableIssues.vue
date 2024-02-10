<!-- resources/js/components/FilterableIssues.vue -->

<template>
    <div>
      <h1>所有活動</h1>
  
      <!-- Category 選單 -->
      <select v-model="selectedCategory" @change="updateFormAction">
        <option value="">請選擇類別</option>
        <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
      </select>
  
      <!-- 顯示 Issues -->
      <div v-if="issues.length > 0">
        <div v-for="issue in issues" :key="issue.id" class="issue-card">
          <h3>{{ issue.title }}</h3>
          <p>類別: {{ issue.category.name }}</p>
          <p>作者: {{ issue.user.name }}</p>
          <p>發佈時間: {{ issue.created_at }}</p>
          <p>評論數量: {{ issue.comments_count }}</p>
        </div>
      </div>
      <div v-else>
        <p>No issues found.</p>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        categories: [],         // 所有類別
        issues: [],             // 所有問題
        selectedCategory: '',   // 選擇的類別
        loading: false,         // 資料載入中的標誌
      };
    },
    mounted() {
      // 當組件被加載時，載入類別
      this.loadCategories();
      // 當 selectedCategory 初始化完成時，也載入對應的問題
      this.loadIssues();
    },
    watch: {
      // 使用監視器，當 selectedCategory 改變時載入對應的問題
      selectedCategory: 'loadIssues',
    },
    methods: {
      loadCategories() {
        this.loading = true;
        axios.get('/api/categories')
          .then(response => {
            this.categories = response.data;
            this.loading = false;
          })
          .catch(error => {
            console.error('Error loading categories:', error);
            this.loading = false;
          });
      },
      loadIssues() {
        if (this.selectedCategory === '') {
          return; // 不載入問題，因為沒有選擇類別
        }
  
        this.loading = true;
        axios.get('/api/issues', { params: { category: this.selectedCategory } })
          .then(response => {
            this.issues = response.data;
            this.loading = false;
          })
          .catch(error => {
            console.error('Error loading issues:', error);
            this.loading = false;
          });
      },
      updateFormAction() {
        // 在這裡處理表單提交的邏輯
        this.loadIssues(); // Reload issues when category changes
      },
    },
  };
  </script>
  
  <style>
  .issue-card {
    border: 1px solid #ddd;
    padding: 10px;
    margin-bottom: 10px;
  }
  </style>
  