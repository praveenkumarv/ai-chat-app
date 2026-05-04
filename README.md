# 🤖 AI Chat Application (PHP + Groq API)

A full-stack **ChatGPT-like AI chatbot** built using **PHP, MySQL, and JavaScript**, integrated with a free AI API from Groq.
This project demonstrates real-world AI integration, backend development, and interactive UI design.

---

## 🚀 Features

* 💬 ChatGPT-like UI (dark theme)
* ⚡ Real-time typing animation
* 🧠 Context-aware conversations (chat memory)
* 💾 Chat history stored in MySQL
* 🔌 API integration with Groq (LLaMA 3.1 models)
* ⌨️ Enter key support for quick messaging
* 🔄 Auto-scroll chat window
* 🧾 Clean and responsive UI

---

## 🛠️ Tech Stack

**Frontend**

* HTML5
* CSS3
* JavaScript (Vanilla)

**Backend**

* PHP (Core PHP)
* MySQL

**AI Integration**

* Groq API (LLaMA 3.1)

---

## 📁 Project Structure

```
ai-chat-app/
│── index.php         # Frontend UI
│── api.php           # AI API integration (Groq)
│── db.php            # Database connection
│── config.php        # API keys
│── save_chat.php     # Store messages
│── fetch_chat.php    # Retrieve chat history
│── assets/
│    └── style.css
```

---

## ⚙️ Setup Instructions

### 1. Clone Repository

```
git clone https://github.com/your-username/ai-chat-app.git
cd ai-chat-app
```

---

### 2. Setup Database

Open MySQL and run:

```sql
CREATE DATABASE ai_chat;

USE ai_chat;

CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_message TEXT,
    ai_response TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

### 3. Configure API Key

Get your API key from Groq and update:

```php
// config.php
define("GROQ_API_KEY", "your_api_key_here");
```

---

### 4. Run Project (XAMPP)

* Move project to:

```
C:\xampp\htdocs\
```

* Start:

  * Apache
  * MySQL

* Open in browser:

```
http://localhost/ai-chat-app/
```

---

## 🧪 Usage

1. Type a message in the input box
2. Press **Enter** or click **Send**
3. View AI response with typing animation
4. Chat history is automatically saved

---

## 🧠 How It Works

* User input is sent to `api.php`
* Previous messages are fetched from MySQL
* Context is sent to Groq API
* AI response is returned and displayed with animation
* Conversation is stored in database

---

## 🔥 Key Highlights

* Implements **context-aware AI (multi-turn conversation)**
* Demonstrates **real API integration**
* Uses **modern UI/UX patterns**
* Designed for **scalability and extension**

---

## 🚀 Future Enhancements

* 🔐 User authentication (multi-user chat)
* 📡 Streaming responses (real-time AI typing)
* 📂 Chat history sidebar
* 🧾 Markdown support (code blocks)
* ☁️ Deployment on AWS / cloud

---

## 📸 Screenshots

*(Add screenshots here)*

---

## 🤝 Contributing

Contributions are welcome! Feel free to fork and improve.

---

## 📄 License

This project is open-source and available under the MIT License.

---

## 👨‍💻 Author

**Praveen Kumar**

* Backend Developer | PHP | Laravel | AWS
* Passionate about building scalable web applications and AI integrations

---
