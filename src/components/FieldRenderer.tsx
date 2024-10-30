import React from 'react';
import { TextField } from './fields/TextField';
import { FieldConfig } from '../lib/types';

interface FieldRendererProps {
  config: FieldConfig;
}

export const FieldRenderer: React.FC<FieldRendererProps> = ({ config }) => {
  const components = {
    text: TextField,
    // Add other field components here
  };

  const Component = components[config.type];
  
  if (!Component) {
    return <div>Unsupported field type: {config.type}</div>;
  }

  return <Component config={config} />;
};