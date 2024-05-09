import React, { useState, useEffect } from 'react';
import axios from 'axios';

function CommercialComponent() {
  const [commercials, setcommercials] = useState([]);
  const [formData, setFormData] = useState({
    Nom: '',
    Prenom: '',
    Sexe: '',
    DateNaissance: '',
    Tel: '',
    Adresse: '',
    Ville:''
  });

  const handleChange = (e) => {
    setFormData({ ...formData, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      const response = await axios.post('http://localhost:8000/api/commercials', formData);
      console.log(response.data);
      fetchCommercials();
      setFormData({
        id: '',
        Nom: '',
        Prenom: '',
        Sexe: '',
        DateNaissance: '',
        Tel: '',
        Adresse: '',
        Ville:''
      });
    } catch (error) {
      console.error('Error submitting data:', error);
    }
  };

  const fetchCommercials = async () => {
    try {
      const response = await axios.get('http://localhost:8000/api/commercials');
      console.log(response.data);
      setcommercials(response.data); // Corrected: setcommercials instead of setcommercials
    } catch (error) {
      console.error('Error fetching data:', error);
    }
  };

  const handleDelete = async (id) => {
    try {
      await axios.delete(`http://localhost:8000/api/commercials/${id}`);
      console.log('Commercial supprimé avec succès');
      fetchcommercials(); 
    } catch (error) {
      console.error('Error deleting commercial:', error);
    }
  };

  useEffect(() => {
    fetchCommercials();
  }, []);

  return (
    <div>
      <form onSubmit={handleSubmit}>
        {/* Form inputs */}
        <button type="submit">Ajouter</button>
      </form>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Sexe</th>
            <th>DateNaissance</th>
            <th>Tel</th>
            <th>Adresse</th>
            <th>Ville</th>
           
          </tr>
        </thead>
        <tbody>
          {commercials.map((commercial) => (
            <tr key={commercial.id}>
              <td>{commercial.id}</td>
              
              <td>{commercial.Nom}</td>
              <td>{commercial.Prenom}</td>
              <td>{commercial.Sexe}</td>
              <td>{commercial.DateNaissance}</td>
              <td>{commercial.Tel}</td>
              <td>{commercial.Adresse}</td>
              <td>{commercial.Ville}</td>
              <td>
                <button onClick={() => handleDelete(commercial.id)}>Supprimer</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}

export default CommercialComponent;
