import React, { useState } from 'react';
import axios from 'axios';
import '../../assets/styles.css';

const Login = () => {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState(null);
  const [loading, setLoading] = useState(false);

  const handleSubmit = async (e) => {
    e.preventDefault();
    setLoading(true);
    try {
      const response = await axios.post('http://localhost:8000/api/auth/login', {
        email,
        password,
      },{
        withCredentials: true 
      });
      console.log(response.data); // Assuming your backend returns some user data upon successful login
      // Redirect or perform any other actions upon successful login
    } catch (error) {
      setError(error.response.data.message); // Assuming your backend returns error messages in a 'message' field
    }
    setLoading(false);
  };

  return (
    <div className="container">
      <h2>Login</h2>
      {error && <p className="error-message">{error}</p>}
      <form onSubmit={handleSubmit}>
        <div className="form-group">
          <label>Email:</label>
          <input
            type="email"
            value={email}
            onChange={(e) => setEmail(e.target.value)}
            required
          />
        </div>
        <div className="form-group">
          <label>Password:</label>
          <input
            type="password"
            value={password}
            onChange={(e) => setPassword(e.target.value)}
            required
          />
        </div>
        <div className="button-wrapper">
          <button type="submit" disabled={loading}>
            {loading && <div className="button-loader"></div>}
            {loading ? 'Logging in...' : 'Login'}
          </button>
        </div>
      </form>
    </div>
  );
};

export default Login;
