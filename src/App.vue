<!-- src/components/ProjectManager.vue -->
<template>
  <div>
    <h1>Project Manager</h1>
    <input type="file" @change="handleFileChange" />
    <button @click="uploadFile">Upload File</button>
    <ul>
      <li v-for="file in files" :key="file.id">
        {{ file.name }}
        <button @click="downloadFile(file.id)">Download</button>
        <button @click="viewFile(file.id)">View</button>
        <button @click="deleteFile(file.id)">Delete</button>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      files: [],
      selectedFile: null,
      uploadedFile: null,
    };
  },
  mounted() {
    this.getFiles();
  },
  methods: {
    handleFileChange(event) {
      this.uploadedFile = event.target.files[0];
    },
    uploadFile() {
      const formData = new FormData();
      formData.append('file', this.uploadedFile);

      // axios.post('/apps/project_manager/upload', formData).then(response => {
      //   this.uploadedFile = null;
      //   this.getFiles();
      // }).catch(error => console.error(error));
    },
    downloadFile(fileId) {

      // axios.get(/apps/project_manager/download/${fileId}, { responseType: 'blob' }).then(response => {
      //   // Handle the downloaded file (e.g., open/save it)
      // }).catch(error => console.error(error));
    },
    viewFile(fileId) {
      // axios.get(/apps/project_manager/view/${fileId}).then(response => {
      //   // Handle the file content (e.g., display it)
      // }).catch(error => console.error(error));
    },
    deleteFile(fileId) {
      // axios.delete(/apps/project_manager/delete/${fileId}).then(response => {
      //   this.getFiles();
      // }).catch(error => console.error(error));
    },
    getFiles() {
    
      // axios.get('/apps/project_manager/files').then(response => {
      //   this.files = response.data;
      // }).catch(error => console.error(error));
    },
  },
};
</script>

<style scoped>
/* Add your component-specific styles here */
</style>