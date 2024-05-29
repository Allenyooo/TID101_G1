import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import path from 'path'   // 載入 path

// console.log(__dirname) // 印出來的結果：/Users/carlos_new/Documents/vite/my_vite

// https://vitejs.dev/config/
export default defineConfig({
  base: "./", // 設定相對路徑
  plugins: [vue()],
  resolve: {
    alias: {
      "@": path.resolve(__dirname, "./src") // @ 符號：直接指向到 src 資料夾
    }
  }
})