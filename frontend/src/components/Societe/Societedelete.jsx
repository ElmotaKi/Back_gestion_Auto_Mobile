import React, { useState, useEffect } from 'react';
import axios from 'axios';

function SocieteComponent() {
  const [societes, setSocietes] = useState([]);
  const [formData, setFormData] = useState({
    id: '',
    RaisonSocial: '',
    ICE: '',
    NumeroCNSS: '',
    NumeroFiscale: '',
    RegistreCommercial: '',
    AdresseSociete: '',
  });

  const handleChange = (e) => {
    setFormData({ ...formData, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      const response = await axios.post('http://localhost:8000/api/societes', formData);
      console.log(response.data);
      fetchSocietes();
      setFormData({
        id: '',
        RaisonSocial: '',
        ICE: '',
        NumeroCNSS: '',
        NumeroFiscale: '',
        RegistreCommercial: '',
        AdresseSociete: '',
      });
    } catch (error) {
      console.error('Error submitting data:', error);
    }
  };

  const fetchSocietes = async () => {
    try {
      const response = await axios.get('http://localhost:8000/api/societes');
      console.log(response.data);
      setSocietes(response.data); // Corrected: setSocietes instead of setsocietes
    } catch (error) {
      console.error('Error fetching data:', error);
    }
  };

  const handleDelete = async (id) => {
    try {
      await axios.delete(`http://localhost:8000/api/societes/${id}`);
      console.log('Societe supprimé avec succès');
      fetchSocietes(); 
    } catch (error) {
      console.error('Error deleting societe:', error);
    }
  };

  useEffect(() => {
    fetchSocietes();
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
            <th>RaisonSocial</th>
            <th>ICE</th>
            <th>NumeroCNSS</th>
            <th>NumeroFiscale</th>
            <th>RegistreCommercial</th>
            <th>AdresseSociete</th>
           
          </tr>
        </thead>
        <tbody>
          {societes.map((societe) => (
            <tr key={societe.id}>
              <td>{societe.id}</td>
              
              <td>{societe.RaisonSocial}</td>
              <td>{societe.ICE}</td>
              <td>{societe.NumeroCNSS}</td>
              <td>{societe.NumeroFiscale}</td>
              <td>{societe.RegistreCommercial}</td>
              <td>{societe.AdresseSociete}</td>
              
              <td>
                <button onClick={() => handleDelete(societe.id)}>Supprimer</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}

export default SocieteComponent;
