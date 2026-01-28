# Learning Management System (LMS)

A comprehensive Learning Management System designed for teaching programming languages including CSS, HTML, JavaScript, React, Python, Java, and PHP.

## Features

- **Three User Roles**:
  - Students: Access courses, submit assignments, track progress
  - Teachers: Create and manage courses, grade assignments
  - Managers: Oversee the platform, manage users, and view analytics

- **Course Management**:
  - Create and organize courses by programming language
  - Upload learning materials (videos, documents, code examples)
  - Create and grade assignments
  - Track student progress

- **Interactive Learning**:
  - Code editor with syntax highlighting
  - Real-time feedback on coding exercises
  - Discussion forums for each course

## Tech Stack

### Backend (Django)
- Python 3.9+
- Django 4.1+
- Django REST Framework
- PostgreSQL
- JWT Authentication

### Frontend (React)
- React 18+
- Redux Toolkit
- React Router
- Material-UI
- Axios for API calls

## Getting Started

### Prerequisites
- Python 3.9 or higher
- Node.js 16.x or higher
- PostgreSQL
- pip (Python package manager)
- npm or yarn

### Backend Setup
1. Navigate to the backend directory:
   ```bash
   cd backend
   ```
2. Create a virtual environment:
   ```bash
   python -m venv venv
   source venv/bin/activate  # On Windows: .\venv\Scripts\activate
   ```
3. Install dependencies:
   ```bash
   pip install -r requirements.txt
   ```
4. Set up the database:
   ```bash
   python manage.py migrate
   ```
5. Create a superuser:
   ```bash
   python manage.py createsuperuser
   ```
6. Run the development server:
   ```bash
   python manage.py runserver
   ```

### Frontend Setup
1. Navigate to the frontend directory:
   ```bash
   cd frontend
   ```
2. Install dependencies:
   ```bash
   npm install
   ```
3. Start the development server:
   ```bash
   npm start
   ```

## Project Structure

```
lms_project/
├── backend/               # Django backend
│   ├── lms/              # Main project directory
│   ├── accounts/         # User authentication and profiles
│   ├── courses/          # Course management
│   ├── api/              # REST API endpoints
│   └── manage.py         # Django management script
├── frontend/             # React frontend
│   ├── public/           # Static files
│   └── src/              # React source code
│       ├── components/   # Reusable UI components
│       ├── pages/        # Page components
│       ├── store/        # Redux store
│       ├── services/     # API services
│       └── App.js        # Main App component
└── README.md             # This file
```

## Environment Variables

Create a `.env` file in the backend directory with the following variables:

```
DEBUG=True
SECRET_KEY=your-secret-key
DATABASE_URL=postgresql://user:password@localhost:5432/lms_db
ALLOWED_HOSTS=localhost,127.0.0.1
CORS_ALLOWED_ORIGINS=http://localhost:3000
```

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
